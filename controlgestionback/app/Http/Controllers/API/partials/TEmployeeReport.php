<?php
namespace App\Http\Controllers\API\partials;
use App\Models\Catalogs\CatCustomField;

/**
 * 
 */
trait TEmployeeReport
{
    public function getCatalogEmployeeReport()
    {
        try {
            
        
         $catalog = [];
            $catalog['cat_custom_field'] = CatCustomField::where('cat_modules_id',1)->get();
          
            return response()->json([
                'success' => true,
                'catalog' => $catalog
            ]);
        }catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Ha ocurrido un error'
            ]);
        }
    }

}
