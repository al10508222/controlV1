<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MunicipiosFieldRequest;
use Illuminate\Http\Request;
use App\Models\municipios;
use App\Models\Catalogs\CatTabulator;
use Illuminate\Support\Facades\DB;

class MunicipiosController extends Controller
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
            $Municipios = municipios::search($search)->orderBy('id','asc')->paginate($rowsPerPage);
            return response()->json([
                'success' => true,
                'municipios' => 1,
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
            $Municipios = new municipios();
            $Municipios->fill($request->all());
            $Municipios->save();
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
            $Municipios = municipios::where('id',$id)->first();
            return response()->json([
                'success' => true,
                'municipios' => $Municipios,
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
            $Municipios = municipios::where('id',$id)->first();
            return response()->json([
                'success' => true,
                'municipios' => $Municipios,
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
            $Municipios = municipios::find($id);
            $Municipios->fill($request->all());
            $Municipios->save();
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
            municipios::destroy($id);
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

    public function getMunicipiosBy(Request $request) {
        try {
            // TODO: Perform this query to convert it to a wherehas to avoid pluck
            error_log("getMunicipiosBy@MunicipiosController");

            $data = $request->all();
            // Gets the id of all tabulators wich hiring type id is given
            $tabulators = CatTabulator::where('cat_contract_type_id',
                $request->input('cat_contract_type_id'))->pluck('id');

            $Municipios = municipios::select('id', 'name')
                ->where('cat_unit_id', $request->input('cat_unit_id'))
                ->where('is_available', true)
                ->whereIn('cat_tabulator_id', $tabulators);
                
            if ($request->input('employee_Municipios') !== null) {
                $Municipios = $Municipios->whereNotIn('id', $request->input('employee_Municipios'));
            }

            $Municipios = $Municipios->get();
            
            return response()->json([
                'success' => true,
                'message' => '',
                'municipios' => $Municipios
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
				'success' => false,
				'message' => 'Ha ocurrido un error'
			]);
        }
    }
}
