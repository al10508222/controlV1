<?php

namespace Database\Seeders;

use App\Models\Catalogs\CatCustomField;
use Illuminate\Database\Seeder;

class CatCustomFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatCustomField::create([
            'name' => 'Infonavit',
            'description' => 'Cuota de crédito INFONAVIT',
            'cat_modules_id' => 1,
            'cat_type_data_id' => 7,
            'is_required' => true,
            'calculator_field' => true,
            'default_value' => '0.0',
            'cat_core_expression_id' => 29,
        ]);
    }
}
