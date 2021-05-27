<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Employment;
use App\Models\Position;
use App\Models\Catalogs\CatEmploymentType;
use App\Models\Employee;
use App\Traits\GeneralResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovementController extends Controller
{
    use GeneralResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $rowPerPage = $request->rowsPerPage;
            $search = $request->search;
            $employments = Employment::with('employment_type', 'unit', 'contract_type', 'location', 'position', 'employee')->search($search)->orderBy('created_at', 'desc')->paginate($rowPerPage);
            return $this->genResponse(200, $employments, null, 'show-employment-list');
        } catch (\Exception $e) {
            return $this->genResponse(400, null, $e->getMessage());
        }
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

            $employee = Employee::with('employment')
                ->find($request->input('employee_id'));

            // Releasing current employee position
            if (isset($employee->employment)) {
                Position::where('id', $employee->employment->position_id)
                    ->update(['is_available' => true]);
            }

            // Updating existing employments as not active
            Employment::where(['employee_id' => $request->input('employee_id')])
                ->update(['is_active'=> false]);

            $employment = new Employment();
            $employment->fill($request->all());
            $employment->is_active = true;
            $employment->save();

            if ($request->input('position_id') != null && $request->input('cat_employment_type_id') != CatEmploymentType::OFFWORK) {
                $position = Position::find($request->input('position_id'));
                $position->is_available = false;
                $position->save();
            }
            
            DB::commit();

            return response()->json([
               'success' => true,
               'message' => 'OK' 
            ], 200);

        } catch (\Exception $e) {
            DB::rollback();
            error_log($e->getMessage());
            return response()->json([
				'success' => false,
				'message' => 'Error'
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* In this method we are going to delete the movement object but
            also we should make the position asigned as available */
        try {
            DB::beginTransaction();
            $employment = Employment::find($id);
            $position = Position::find($employment->position_id);
            if ($position != null) {
                $position->is_available = true;
                $position->save();
            }
            
            $employment->delete();
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'OK' 
             ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
				'success' => false,
				'message' => 'Error'
			]);
        }
    }
}
