<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\ReportManager;
use App\Models\Catalogs\CatModule;
use Illuminate\Support\Facades\DB;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
           //dd($request->all());
           $modules = CatModule::with([
            'reportManager'
           ])
           ->has('reportManager')
           ->get();

            return response()->json([
                'success' => true,
                'modules' => $modules,
			]);
        }catch (\Exception $e) {
            error_log($e->getMessage());
			return response()->json([
				'success' => false,
				'message' => 'Error'
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
            //dd($request->all());
            DB::beginTransaction();
            $reportManager = new ReportManager;
            //$reportManager->fill($request->all());
            $reportManager->fill([
                'name' => ($request->input('mainForm.name')),
                'cat_module_id' => ($request->input('mainForm.cat_module_id')) 
            ]);
            $reportManager->payload = json_encode($request->input('payload'));
            $reportManager->model = json_encode($request->input('model'));
            $reportManager->cat_type_employee_id = $request->input('model.cat_type_employee_id');
            $reportManager->user_profile_id = Auth::user()->profile_id;
            $reportManager->user_id = Auth::user()->id;
            // 'user_profile_id', 'user_id'
            $reportManager->save();
            DB::commit();

            return response()->json([
				'success' => true,
				'message' => '',
			], 200);

        } catch (\Exception $e) {
            DB::rollback();
			return response()->json([
				'success' => false,
				'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportManager  $reportManager
     * @return \Illuminate\Http\Response
     */
    public function show(ReportManager $reportManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReportManager  $reportManager
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportManager $reportManager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReportManager  $reportManager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReportManager $reportManager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportManager  $reportManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportManager $reportManager)
    {
        //
    }

    public function downloadReport($id)
    {
        //
    }
}
