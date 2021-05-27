<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Date;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Repositories\Date\DateRepository;
use App\Http\Requests\StoreDateRequest;

class DateController extends Controller
{
    protected $DateRepo;

    public function __construct(DateRepository $dateRepository)
    {
        $this->dateRepo = $dateRepository;
    }

    public function index(Request $request)
    {
        try {
            $rowsPerPage = $request->input('rowsPerPage');
            $search = $request->input('search');
            $dates = Date::search($search)->orderBy('created_at','desc')->paginate($rowsPerPage);
            return response()->json([
                'success' => true,
                'dates' => $dates,
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
    public function store(StoreDateRequest $request)
    {

        try {
            DB::beginTransaction();
            $date = new Date();
            $date->fill($request->all());
            $date->save();
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
            $date = Date::find($id);
            return response()->json([
                'success' => true,
                'date' => $date,
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
        try{
            $date = Date::find($id)->update($request->except('id'));
                return response()->json([
                'date' => $date
           ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'No se pudo completar la acción: ' . $e->getMessage()
            ], 300);
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
            $this->dateRepo->delete($id);

            return response()->json([
                'success' => true,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo completar la acción',
            ], 500);
        }
    }
}
