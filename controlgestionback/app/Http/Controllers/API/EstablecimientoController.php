<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\establecimientosFieldRequest;
use Illuminate\Http\Request;
use App\Models\establecimientos;
use App\Models\entidades;

use App\Models\Catalogs\CatTabulator;
use Illuminate\Support\Facades\DB;

class EstablecimientoController extends Controller
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
            $establecimientos = establecimientos::search($search)->orderBy('TIPOESTABLECIMIENTONOMBRE', 'asc')->paginate($rowsPerPage);

            return response()->json([
                'success' => true,
                'establecimientos' => $establecimientos
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
            $establecimientos = new establecimientos();
            $establecimientos->fill($request->all());
            $establecimientos->save();
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
            $establecimientos = establecimientos::where('TIPOESTABLECIMIENTOID',$id)->first();
            return response()->json([
                'success' => true,
                'establecimientos' => $establecimientos,
			]);
        }catch (\Exception $e) {
            DB::rollback();
			return response()->json([
				'success' => false,
				'message' => $e->getMessage()
			]);
        }
    }

    public function ShowestablecimientosAll(){
        try {
            $establecimientos = establecimientos::all();

            $datos = array(); 

            $datos[] = $establecimientos; 

            foreach ($establecimientos as $i => $value) {
                $entidades = entidades::find($value->ENTIDADFEDERATIVAID);
                $entidades->Entidad;
                $datos['data'][$i] = $value; 
                $datos['data'][$i]['ENTIDADFEDERATIVANOMBRE'] = $entidades->ENTIDADFEDERATIVANOMBRE; 
            }

            return response()->json([
                'success' => true,
                'establecimientos_todos' => $datos
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
            $establecimientos = establecimientos::where('TIPOESTABLECIMIENTOID',$id)->first();

            return response()->json([
                'success' => true,
                'establecimientos' => $establecimientos,
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
            $establecimientos = establecimientos::find($id);
            $establecimientos->fill($request->all());
            $establecimientos->save();
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
            establecimientos::destroy($id);
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
