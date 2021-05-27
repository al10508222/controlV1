<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Str;
use App\Http\Requests\FileUploadRequest;

class FileUploadController extends Controller
{
    static $DOC_FILE_TYPE = "pdf";
	static $IMG_FILE_TYPE = "img";
	static $XML_FILE_TYPE = "xlsx";
	static $MODULES = ['employee','employee_img','hiringMemo','contracts','invoice','provider','signureReport'];

	public function upload(FileUploadRequest $request) {


			$file = $request->file('document');
			$module = $request->input('module');
			$fileType = $request->input('fileType');
			/* Se verifica que exista el valor en el array para una manipulación del almacenamiento*/
			if(in_array($module, static::$MODULES)) {
				$fileUploaded = static::storeFile($file, $module,$fileType);
				return response()->json([
					'success' => true,
					'file' => $fileUploaded,
				], 200);
			}
		try{
		}catch (Exception $e) {
			return response()->json([
				'message' => 'No se pudo completar la acción',
				'error' => $e
			], 500);
		}
	}
	
    public static function storeFile($fileInput,$module, $fileType){
		$fileName = Str::random(40) . date('Ymdhh')  . "." . $fileInput->getClientOriginalExtension();
		
		$file = new File;
		$file->user_id = 1;
		$path = $fileInput->storeAs($module, $fileName);
		$file->filetype = $fileType;
		$file->path = $path;
		$file->filename = $fileName;
		$file->originalname = $fileInput->getClientOriginalName();
		$file->save();
		return $file;
    }
    
    public function showFile(Request $request,$type,$id){
		
		//$id = decrypt($id);
		$file = File::find($id);
		
		$pathToFile = storage_path("app/" . $file->path);
		$fileName= $file->originalname;

		if($request->input('download') == "1"){
			return response()->download($pathToFile);
		}
		
		return response()->download(
			$pathToFile,
			$fileName,
			[
				'Content-Type' => 'application/pdf',
				'Content-Disposition' => 'inline; filename="'.$fileName.'"'
			],
			'inline'//attachment
		);
	}
	
	public function getFile(Request $request, $id){
		$file = File::find($id);
		$pathToFile = storage_path("app/" . $file->path);
		$width = $request->input('w'); 
		$height = $request->input('h');
		$img = \Image::make($pathToFile);
		if($width != '' && $height != ''){
			$img->resize($request->input('w'), $request->input('h'));
		}
		return $img->response('jpg');
	}
	

}
