<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\localidadesFieldRequest;
use Illuminate\Http\Request;
use App\Models\localidades;
use Illuminate\Support\Facades\DB;

class LocalidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // try {
        //     $rowsPerPage = $request->rowsPerPage;
        //     $search = $request->input('search');
        //     $localidades = localidades::search($search)->orderBy('ID','asc')->paginate($rowsPerPage);
        //     return response()->json([
        //         'success' => true,
        //         'localidades' => $localidades,
		// 	]);
        // }catch (\Exception $e) {
        //     DB::rollback();
		// 	return response()->json([
		// 		'success' => false,
		// 		'message' => $e->getMessage()
		// 	]);
        // }
        try {
            // $localidades = localidades::search($municipio)->orderBy('ID','asc')->get();
            $rowsPerPage = $request->rowsPerPage;
            if($request->input('municipio') > 0){
                $localidades = localidades::where('ENTIDADFEDERATIVAID', $request->input('entidad'))
                                                            ->where('MUNICIPIOID', $request->input('municipio'))
                                                            ->orderBy('LOCALIDADNOMBRE','asc')->paginate($rowsPerPage);
            }
            else{
                
                // $search = $request->input('search');
                // $localidades = localidades::search($search)->orderBy('ID','asc')->paginate($rowsPerPage);
            }
            return response()->json([
                'success' => true,
                'localidades' => $localidades,
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
            $localidades = new localidades();
            $localidades->fill($request->all());
            $localidades->save();
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
            $localidades = localidades::where('ID',$id)->first();
            return response()->json([
                'success' => true,
                'localidades' => $localidades,
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
            $localidades = localidades::where('ID',$id)->first();
            return response()->json([
                'success' => true,
                'localidades' => $localidades,
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
            $localidades = localidades::find($id);
            $localidades->fill($request->all());
            $localidades->save();
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
            localidades::destroy($id);
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

    


    //otros metodos

    public function ShowLocalidadesByFilter(Request $request)
    {
        try {
            // $params = [
            //     'ENTIDADFEDERATIVAID' => $request->input('ENTIDADFEDERATIVAID'),
            //     'MUNICIPIOID' => $request->input('MUNICIPIOID'),
            // ];
            $sql = 'SELECT * FROM localidades WHERE "ENTIDADFEDERATIVAID" = '.$request->input('ENTIDADFEDERATIVAID').' AND "MUNICIPIOID" = '.$request->input('MUNICIPIOID').';';
            $localidades = DB::select($sql);
            $datos = array(); 

            foreach ($localidades as $i => $value) {
                $datos['data'][$i] = $value; 
            }

            return response()->json([
                'success' => true,
                'localidades' => $datos
			]);
        }catch (\Exception $e) {
            DB::rollback();
			return response()->json([
				'success' => false,
				'message' => $e->getMessage()
			]);
        }
    }

    public function indexFilter(Request $request)
    {
        try {
            $municipio = $request->input('municipio');
            // $localidades = localidades::search($municipio)->orderBy('ID','asc')->get();
            
            $localidades = localidades::where('ENTIDADFEDERATIVAID', $request->input('entidad'))
                                                        ->where('MUNICIPIOID', $request->input('municipio'))
                                                        ->orderBy('LOCALIDADNOMBRE','asc')->get();
            return response()->json([
                'success' => true,
                'localidades' => $localidades,
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
