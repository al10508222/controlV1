<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\nivel_atencionFieldRequest;
use Illuminate\Http\Request;
use App\Models\nivel_atencion;
use App\Models\Catalogs\CatTabulator;
use Illuminate\Support\Facades\DB;

class NivelAtencionController extends Controller
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
            $nivel_atencion = nivel_atencion::search($search)->orderBy('NIVELATENCIONNOMBRE', 'asc')->paginate($rowsPerPage);

            return response()->json([
                'success' => true,
                'nivel_atencion' => $nivel_atencion
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            DB::beginTransaction();
            $nivel_atencion = new nivel_atencion();
            $nivel_atencion->fill($request->all());
            $nivel_atencion->save();
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
            $nivel_atencion = nivel_atencion::where('NIVELATENCIONID',$id)->first();
            return response()->json([
                'success' => true,
                'nivel_atencion' => $nivel_atencion,
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
            $nivel_atencion = nivel_atencion::where('NIVELATENCIONID',$id)->first();

            return response()->json([
                'success' => true,
                'nivel_atencion' => $nivel_atencion,
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
            $nivel_atencion = nivel_atencion::find($id);
            $nivel_atencion->fill($request->all());
            $nivel_atencion->save();
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
            nivel_atencion::destroy($id);
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

    public function ShowNivelAtencionAll(Request $request)
    {
        try {
            $nivel_atencion = nivel_atencion::all(); 

            return response()->json([
                'success' => true,
                'nivel_atencion' => $nivel_atencion
			]);
        }catch (\Exception $e) {
            DB::rollback();
			return response()->json([
				'success' => false,
				'message' => $e->getMessage()
			]);
        }
    }
}
