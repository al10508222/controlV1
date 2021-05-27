<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Traits\GeneralResponse;
use App\Traits\ProfileVerify;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    use GeneralResponse, ProfileVerify;

     /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request [page, rowsPerPage, search]
     * @return \Illuminate\Http\JsonResponse [code, obj, message, action]
     */
    public function index()
    {
        try {
            $items = Module::with('permissions')->orderBy('created_at','desc')->get();
            return $this->genResponse(200, $items, null, 'show-modules-list');
        }
        catch (Exception $e) {
            return $this->genResponse(400, null, $e->getMessage());
        }
    }

     /** 
    * @param  \Illuminate\Http\Request [name, key]
    * @return \Illuminate\Http\JsonResponse
    */
    public function store()
    {
        # code...
    }

    /** 
    * @param  \Illuminate\Http\Request [name, key]
    * @return \Illuminate\Http\JsonResponse
    */
    public function update()
    {
        # code...
    }
    public function destroy()
    {
        # code...
    }
}
