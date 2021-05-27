<?php
namespace App\Traits;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

trait FileUpload {

  /**
   * Funcion para obtener una imagen
   * @param $id Id de imagen en files table
   * @param $type Formato de imagen extension
   * @return image
   */
  public function getFile($id,$type ='jpg')
  {
      $file       = File::find($id);
		  $pathToFile = storage_path("app/" . $file->path);
		  $img        = \Image::make($pathToFile);
		  return $img->response($type);
  }

  public function download($id,$fileName ='Invoice.pdf')
  {
        $file = File::find($id);
        $pathToFile = storage_path("app/" . $file->path);
        return response()->download($pathToFile,$fileName);
  }


  /**
   * Funcion para guardar una imagen en files
   * @param $moduleWithPath Nombre del modulo modulo/dir/dir/file.ext
   * @param $fileName Nombre del archivo dado
   * @param $originalName Nombre ofiginal de la imagen
   * @param $type Tipo de archivo
   * @return Object File
   */
  public function storeFile($moduleWithPath,$fileName,$originalName,$type = 'pdf')
  {
		  $objFile               = new File();
		  $objFile->user_id      = 1;
		  $objFile->filetype     = $type;
		  $objFile->path         = $moduleWithPath;
		  $objFile->filename     = $fileName;
		  $objFile->originalname = $originalName;
		  $objFile->save();
		  return $objFile;
  }
}
