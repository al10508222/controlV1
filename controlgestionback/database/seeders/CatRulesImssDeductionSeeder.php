<?php

namespace Database\Seeders;

use App\Models\Catalogs\CatRulesImssDeduction;
use Illuminate\Database\Seeder;

class CatRulesImssDeductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatRulesImssDeduction::create([
            "id"          => 1,
            "description" => "Prestaciones en Especie-Cuota excedente",
            "operation"   => "Si el SDI<(3*UMA), entonces no se calcula y queda en 0 "
        ]);
    }
}
