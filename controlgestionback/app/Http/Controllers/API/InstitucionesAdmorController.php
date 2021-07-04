<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\instituciones_admorFieldRequest;
use Illuminate\Http\Request;
use App\Models\instituciones_admor;
use Illuminate\Support\Facades\DB;

class InstitucionesAdmorController extends Controller
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
            $instituciones_admor = instituciones_admor::search($search)->orderBy('id','asc')->paginate($rowsPerPage);
            return response()->json([
                'success' => true,
                'instituciones_admor' => $instituciones_admor,
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
            $instituciones_admor = new instituciones_admor();
            $instituciones_admor->fill($request->all());
            $instituciones_admor->save();
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
            $instituciones_admor = instituciones_admor::where('id',$id)->first();
            return response()->json([
                'success' => true,
                'instituciones_admor' => $instituciones_admor,
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
            $instituciones_admor = instituciones_admor::where('id',$id)->first();
            return response()->json([
                'success' => true,
                'instituciones_admor' => $instituciones_admor,
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
            $instituciones_admor = instituciones_admor::find($id);
            $instituciones_admor->fill($request->all());
            $instituciones_admor->save();
            DB::commit();

            return response()->json([
				'success' => true,
				'message' => '200'
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
            instituciones_admor::destroy($id);
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


    //otros metodos

    public function InstitucionesAdmorAll(Request $request)
    {
        try {
            $instituciones_admor = instituciones_admor::all(); 

            $datos = array(); 

            foreach ($instituciones_admor as $i => $value) {
                $datos['data'][$i] = $value; 
            }

            return response()->json([
                'success' => true,
                'instituciones_admors' => $datos
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
