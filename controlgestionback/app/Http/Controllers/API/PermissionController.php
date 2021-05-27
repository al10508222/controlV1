<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\PermissionPost;
use App\Models\Permission;
use App\Traits\GeneralResponse;
use App\Traits\ProfileVerify;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    use GeneralResponse, ProfileVerify;

     /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request [page, rowsPerPage, search]
     * @return \Illuminate\Http\JsonResponse [code, obj, message, action]
     */
    public function index(Request $request)
    {
        //if($error = $this->can(['permissions-view'])){return $error;} //validation

        try {
            $rowsPerPage = $request->rowsPerPage;
            $search = $request->search;
            $items = Permission::select('name', 'key')->search($search)->orderBy('created_at','desc')->paginate($rowsPerPage);

            return $this->genResponse(200, $items, null, 'show-permissions-list');
        }
        catch (Exception $e) {
            return $this->genResponse(400, null, $e->getMessage());
        }
    }

    /**
    * @param  \Illuminate\Http\Request [name, key]
    * @return \Illuminate\Http\JsonResponse
    */
    public function store(PermissionPost $request)
    {
        try {
            DB::beginTransaction();
                $permission = new Permission();
                $permission->fill($request->all());
                $permission->save();
            DB::commit();
            return $this->genResponse(200, null, 'Permiso creado');

        } catch (\Exception $e) {
            DB::rollback();
            return $this->genResponse(500, null, $e->getMessage());
        }
    }

    /**
    * @param  \Illuminate\Http\Request [name, key]
    * @return \Illuminate\Http\JsonResponse
    */
    public function update(PermissionPost $request, $id)
    {
        try {
            DB::beginTransaction();
                $permission = Permission::find($id);
                $permission->fill($request->all());
                $permission->save();

            DB::commit();
            return $this->genResponse(200, null, 'Permiso actualizado');

        } catch (\Exception $e) {
            DB::rollback();
            return $this->genResponse(500, null, $e->getMessage());
        }
    }

    /**
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function destroy()
    {
        # code...
    }
}
