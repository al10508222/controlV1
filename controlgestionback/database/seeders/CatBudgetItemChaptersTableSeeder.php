<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class CatBudgetItemChaptersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cat_budget_item_chapters')->delete();
        
        \DB::table('cat_budget_item_chapters')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => '1000',
                'description' => 'Servicios Personales',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'code' => '2000',
                'description' => 'Materiales y suministros',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'code' => '3000',
                'description' => 'Servicios generales',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'code' => '4000',
                'description' => 'Subsidios y otras ayudas',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'code' => '5000',
                'description' => 'Bienes muebles, inmuebles e intangibles',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'code' => '6000',
                'description' => 'Inversión pública',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'code' => '7000',
                'description' => 'Inversiones Financieras y otras provisiones',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'code' => '8000',
                'description' => 'Participaciones y aportaciones',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'code' => '9000',
                'description' => 'Deuda pública',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}