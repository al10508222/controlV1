<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemSetting;

class SystemSettingsController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth', ['except' => ['edit']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        //
        try {
            $setting = new SystemSetting();
            $setting->fill($request->all());
            $setting->save();

            return response()->json([
                'success' => true,
                'message' => 'Todo OK',
            ], 200);
        } catch (\Exception $e) {
            error_log($e->getMessage());
			return response()->json([
				'success' => false,
				'message' => 'Error'
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

    public function edit() {
        try {
            $config = SystemSetting::orderBy('created_at', 'desc')->first();

            return response()->json([
                "success" => true,
                "config" => $config
            ], 200);

        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json([
				'success' => false,
				'message' => 'Error'
			]);
        }
    }

    public function getConfig() {
        try {
            $config = SystemSetting::orderBy('created_at', 'desc')->first();

            return response()->json([
                "success" => true,
                "config" => $config
            ], 200);

        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json([
				'success' => false,
				'message' => 'Error'
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
        //
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
