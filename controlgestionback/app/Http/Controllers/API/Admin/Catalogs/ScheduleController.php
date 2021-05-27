<?php

namespace App\Http\Controllers\API\Admin\Catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\ScheduleDay;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $rowsPerPage = $request->input('rowsPerPage');
            $search = $request->input('search');
            $schedules = Schedule::search($search)->orderBy('created_at', 'desc')->paginate($rowsPerPage);
            return response()->json([
                'success' => true,
                'schedules' => $schedules,
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }

        // $list = CatSchedule::all();
        // return response()->json(['success'=>true,'data'=>['schedules'=>$list]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            DB::beginTransaction();
            $catSchedule = new Schedule();
            $catSchedule->fill($request->all());
            $catSchedule->save();
            $days = $request->input('days');
            foreach ($days as $day) {
                $scheduleDay = new ScheduleDay();
                $scheduleDay->cat_day_id = isset($day['id']) ? $day['id'] : null;
                $scheduleDay->fill($day);
                $scheduleDay->schedule_id = $catSchedule->id;
                $scheduleDay->save();
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => '',
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $catSchedule = Schedule::with(['CatTimeZone'])->where('id',$id)->first();
            $scheduleDay = ScheduleDay::with(['CatDay'])->where('schedule_id',$id)->get();
            $catSchedule->days = $scheduleDay;
            return response()->json([
                'success' => true,
                'schedule' => $catSchedule,
			]);
        }catch (\Exception $e) {
            DB::rollback();
			return response()->json([
				'success' => false,
				'message' => $e->getMessage()
			]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $catSchedule = Schedule::find($id);
            $catSchedule->fill($request->all());
            $catSchedule->save();   
            $days = $request->input('days');
            foreach ($days as $day) {
                $scheduleDay = ScheduleDay::where('schedule_id',$id)->where('id',$day['id'])->first();
                $scheduleDay->fill($day);
                $scheduleDay->schedule_id = $catSchedule->id;
                $scheduleDay->save();
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => '',
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $catSchedule = Schedule::with(['CatTimeZone'])->where('id',$id)->first();
            $scheduleDay = ScheduleDay::with(['CatDay'])->where('schedule_id',$id)->get();
            //error_log(print_r($scheduleDay, true));
            $catSchedule->days = $scheduleDay;
            $catSchedule->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            error_log($e->getMessage());
            return response('',500);
        }
    }
}
