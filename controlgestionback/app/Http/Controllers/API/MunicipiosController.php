<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MunicipiosFieldRequest;
use Illuminate\Http\Request;
use App\Models\municipios;
use App\Models\entidades;

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
            $Municipios = municipios::search($search)->orderBy('ENTIDADFEDERATIVAID', 'asc')->paginate($rowsPerPage);

            return response()->json([
                'success' => true,
                'municipios' => $Municipios
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
            $Municipios = municipios::where('MUNICIPIOID',$id)->first();
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

    public function ShowMunicipiosAll(){
        try {
            $Municipios = municipios::all();

            $datos = array(); 

            $datos[] = $Municipios; 

            foreach ($Municipios as $i => $value) {
                $entidades = entidades::find($value->entidad_id);
                $entidades->Entidad;
                $datos['data'][$i] = $value; 
                $datos['data'][$i]['entidad_nombre'] = $entidades->entidad_nombre; 
            }

            return response()->json([
                'success' => true,
                'municipios_todos' => $datos
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
            $Municipios = municipios::where('MUNICIPIOID',$id)->first();

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
				'message' => $e->getMessage()
			]);
        }
        
    }
}
