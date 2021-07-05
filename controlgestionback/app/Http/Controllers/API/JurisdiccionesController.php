<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\jurisdiccionesFieldRequest;
use Illuminate\Http\Request;
use App\Models\jurisdicciones;
use App\Models\entidades;

use App\Models\Catalogs\CatTabulator;
use Illuminate\Support\Facades\DB;

class JurisdiccionesController extends Controller
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
            $jurisdicciones = jurisdicciones::search($search)->orderBy('id', 'asc')->paginate($rowsPerPage);

            return response()->json([
                'success' => true,
                'jurisdicciones' => $jurisdicciones
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
            $jurisdicciones = new jurisdicciones();
            $jurisdicciones->fill($request->all());
            $jurisdicciones->save();
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
            $jurisdicciones = jurisdicciones::where('id',$id)->first();
            return response()->json([
                'success' => true,
                'jurisdicciones' => $jurisdicciones,
			]);
        }catch (\Exception $e) {
            DB::rollback();
			return response()->json([
				'success' => false,
				'message' => $e->getMessage()
			]);
        }
    }

    public function ShowJurisdiccionesAll(){
        try {
            $jurisdicciones = jurisdicciones::all();

            $datos = array(); 

            $datos[] = $jurisdicciones; 

            foreach ($jurisdicciones as $i => $value) {
                $entidades = entidades::find($value->ENTIDADFEDERATIVAID);
                $entidades->Entidad;
                $datos['data'][$i] = $value; 
                $datos['data'][$i]['ENTIDADFEDERATIVANOMBRE'] = $entidades->ENTIDADFEDERATIVANOMBRE; 
            }

            return response()->json([
                'success' => true,
                'jurisdicciones' => $datos
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
            $jurisdicciones = jurisdicciones::where('id',$id)->first();

            return response()->json([
                'success' => true,
                'jurisdicciones' => $jurisdicciones,
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
            $jurisdicciones = jurisdicciones::find($id);
            $jurisdicciones->fill($request->all());
            $jurisdicciones->save();
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
            jurisdicciones::destroy($id);
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
