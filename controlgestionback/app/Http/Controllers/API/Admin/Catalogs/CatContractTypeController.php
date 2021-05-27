<?php

namespace App\Http\Controllers\API\Admin\Catalogs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalogs\CatContractType;

class CatContractTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $rowsPerPage = $request->input('rowsPerPage');
            $search = $request->input('search');
            $contracts = CatContractType::search($search)->orderBy('created_at', 'desc')->paginate($rowsPerPage);
            
            return response()->json([
                'success' => true,
                'contracts' => $contracts,
            ]);
        } catch (\Exception $e) {
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
            $contract = new CatContractType();
            $contract->fill($request->all());
            $contract->save();

            return response()->json([
				'success' => true,
				'message' => '',
			], 200);
        } catch (\Exception $e) {
            error_log($e->getMessage());
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
        //
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
            $contract = CatContractType::find($id);
            return response()->json([
                'success' => true,
                'contract' => $contract,
			]);
        } catch (\Exception $e) {
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

            $contract = CatContractType::find($id);
            $contract->fill($request->all());
            $contract->save();

            return response()->json([
				'success' => true,
				'message' => '',
			], 200);
        } catch (\Exception $e) {
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
        //
    }
}
