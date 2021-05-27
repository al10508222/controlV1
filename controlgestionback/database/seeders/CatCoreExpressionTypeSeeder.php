<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\Core\CatCoreExpressionType;

class CatCoreExpressionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatCoreExpressionType::create([
            'id'                => 1,
            'name'          =>'Aritmético',
        ]);
        CatCoreExpressionType::create([
            'id'                => 2,
            'name'          =>'Funciones',
        ]);
        CatCoreExpressionType::create([
            'id'                => 3,
            'name'          =>'Campos',
        ]);
        CatCoreExpressionType::create([
            'id'                => 4,
            'name'          =>'Númerico',
        ]);
        CatCoreExpressionType::create([
            'id'                => 5,
            'name'          =>'Campos Personalizados',
        ]);
        // CatCoreExpressionType::create([
        //     'id'             => 5,
        //     'name'          => 'Equalidad',
        // ]);
    }
}
