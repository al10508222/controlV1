<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\VialidadesFieldRequest;
use Illuminate\Http\Request;
use App\Models\VialidadesModel;
use App\Models\Catalogs\CatTabulator;
use Illuminate\Support\Facades\DB;

class VialidadesController extends Controller
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
            $Vialidades = VialidadesModel::search($search)->orderBy('id','desc')->paginate($rowsPerPage);
            return response()->json([
                'success' => true,
                'vialidades' => $Vialidades,
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
            $Vialidades = new VialidadesModel();
            $Vialidades->fill($request->all());
            $Vialidades->save();
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
            $Vialidades = VialidadesModel::where('id',$id)->first();
            return response()->json([
                'success' => true,
                'vialidades' => $Vialidades,
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
            $Vialidades = VialidadesModel::where('id',$id)->first();
            return response()->json([
                'success' => true,
                'vialidades' => $Vialidades,
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
            $Vialidades = VialidadesModel::find($id);
            $Vialidades->fill($request->all());
            $Vialidades->save();
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
            VialidadesModel::destroy($id);
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

    public function getVialidadesBy(Request $request) {
        try {
            // TODO: Perform this query to convert it to a wherehas to avoid pluck
            error_log("getVialidadesBy@VialidadesController");

            $data = $request->all();
            // Gets the id of all tabulators wich hiring type id is given
            $tabulators = CatTabulator::where('cat_contract_type_id',
                $request->input('cat_contract_type_id'))->pluck('id');

            $Vialidades = VialidadesModel::select('id', 'name')
                ->where('cat_unit_id', $request->input('cat_unit_id'))
                ->where('is_available', true)
                ->whereIn('cat_tabulator_id', $tabulators);
                
            if ($request->input('employee_Vialidades') !== null) {
                $Vialidades = $Vialidades->whereNotIn('id', $request->input('employee_Vialidades'));
            }

            $Vialidades = $Vialidades->get();
            
            return response()->json([
                'success' => true,
                'message' => '',
                'Vialidades' => $Vialidades
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
				'success' => false,
				'message' => 'Ha ocurrido un error'
			]);
        }
    }
}
