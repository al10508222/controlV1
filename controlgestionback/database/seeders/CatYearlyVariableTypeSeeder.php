<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatYearlyVariableType;

class CatYearlyVariableTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        CatYearlyVariableType::create([
            'id' => 1,
            'name' => 'UMA'
        ]);
        CatYearlyVariableType::create([
            'id' => 2,
            'name' => 'DIAS_AÑO'
        ]);
        CatYearlyVariableType::create([
            'id' => 3,
            'name' => 'Tasa ISN'
        ]);
    }
}
