<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\FileUploadController;
use App\Http\Controllers\Controller;
use App\Models\EmployeeDocument;
use Illuminate\Support\Facades\DB;
use App\Models\CatDocument;
use Illuminate\Database\Eloquent\Builder;


class EmployeeDocumentsController extends Controller
{

    public function index(Request $request){
        try {
            $documents = CatDocument::select('id','name','observations','is_required','is_visible')->orderBy('name','asc')->get();
            return response()->json([
                'success' => true,
                'documents' => $documents,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $module = "employee";
            $type = "pdf";
            DB::beginTransaction();
            $fileId = FileUploadController::storeFile($file,$module,$type);
            $employeeDocument = new EmployeeDocument();
            $employeeDocument->employee_id = $request->input('employee_id');
            $employeeDocument->cat_document_id = $request->input('cat_document_id');
            $employeeDocument->file_id = $fileId;
            // $employeeDocument->expiry_date = $request->input('expiry_date');
            $employeeDocument->save();
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => '',
                'document' => $employeeDocument
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
