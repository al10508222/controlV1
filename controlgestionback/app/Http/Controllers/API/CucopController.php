<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CucopsFieldRequest;
use Illuminate\Http\Request;
use App\Models\CucopModel;
use App\Models\Catalogs\CatTabulator;
use Illuminate\Support\Facades\DB;

class CucopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $rowsPerPage = $request->rowsPerPage;
            $search = $request->input('search');
            $Cucops = CucopModel::search($search)->orderBy('clave_cucop','desc')->paginate($rowsPerPage);
            return response()->json([
                'success' => true,
                'cucop' => $Cucops,
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
    public function store(Request $request)
    {
        try {

            DB::beginTransaction();
            $Cucop = new CucopModel();
            $Cucop->fill($request->all());
            $Cucop->save();
            DB::commit();

            return response()->json([
				'success' => true,
				'message' => 'Registro Almacenado correctamente',
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
        try {
            $Cucop = CucopModel::where('id',$id)->first();
            return response()->json([
                'success' => true,
                'Cucop' => $Cucop,
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $Cucop = CucopModel::where('id',$id)->first();
            return response()->json([
                'success' => true,
                'Cucop' => $Cucop,
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
            $Cucop = CucopModel::find($id);
            $Cucop->fill($request->all());
            $Cucop->save();
            DB::commit();

            return response()->json([
				'success' => true,
				'message' => 'Actualizado exitosamente',
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
            CucopModel::destroy($id);
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

    public function getCucopsBy(Request $request) {
        try {
            // TODO: Perform this query to convert it to a wherehas to avoid pluck
            error_log("getCucopsBy@CucopController");

            $data = $request->all();
            // Gets the id of all tabulators wich hiring type id is given
            $tabulators = CatTabulator::where('cat_contract_type_id',
                $request->input('cat_contract_type_id'))->pluck('id');

            $Cucops = CucopModel::select('id', 'name')
                ->where('cat_unit_id', $request->input('cat_unit_id'))
                ->where('is_available', true)
                ->whereIn('cat_tabulator_id', $tabulators);
                
            if ($request->input('employee_Cucops') !== null) {
                $Cucops = $Cucops->whereNotIn('id', $request->input('employee_Cucops'));
            }

            $Cucops = $Cucops->get();
            
            return response()->json([
                'success' => true,
                'message' => '',
                'Cucops' => $Cucops
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
				'success' => false,
				'message' => 'Ha ocurrido un error'
			]);
        }
    }
}
