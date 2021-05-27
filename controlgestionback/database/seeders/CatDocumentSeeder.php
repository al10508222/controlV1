<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatDocument;

class CatDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatDocument::create([
            'id' => 1,
            'name' =>'INE',
            'cat_module_id' => 10,
            'observations' => 'Este documento tiene que estar vigente',
            'is_required' => true,
            'is_visible' => true
        ]);
        CatDocument::create([
            'id' => 2,
            'name' =>'Comprobante de domicilio',
            'cat_module_id' => 10,
            'observations' => 'No mayor a 3 meses',
            'is_required' => true,
            'is_visible' => true
        ]);
        CatDocument::create([
            'id' => 3,
            'name' =>'Comprobante de estudios',
            'cat_module_id' => 10,
            'observations' => '',
            'is_required' => true,
            'is_visible' => true
        ]);
        CatDocument::create([
            'id' => 4,
            'name' =>'Contrato infotec',
            'cat_module_id' => 4,
            'observations' => '',
            'is_required' => true,
            'is_visible' => true
        ]);
        \DB::statement('ALTER SEQUENCE cat_documents_id_seq RESTART WITH 5');
    }
}
