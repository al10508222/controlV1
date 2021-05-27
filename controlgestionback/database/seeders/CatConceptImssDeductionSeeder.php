<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatConceptImssDeduction;

class CatConceptImssDeductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatConceptImssDeduction::create([
            'id'             => 1,
            'description'    => "Enfermedad y maternidad - Prestaciones en especie-cuota fija",
        ]);
        CatConceptImssDeduction::create([
            'id'             => 2,
            'description'    => "Enfermedad y maternidad - Prestaciones en especie-cuota excedente",
        ]);
        CatConceptImssDeduction::create([
            'id'             => 3,
            'description'    => "Enfermedad y maternidad - Prestaciones en dinero",
        ]);
        CatConceptImssDeduction::create([
            'id'             => 4,
            'description'    => "Enfermedad y maternidad - Pensionados y beneficiarios",
        ]);
        CatConceptImssDeduction::create([
            'id'             => 5,
            'description'    => "Invalidez y vida",
        ]);
        CatConceptImssDeduction::create([
            'id'             => 6,
            'description'    => "Guarderia y prestaciones sociales",
        ]);
        CatConceptImssDeduction::create([
            'id'             => 7,
            'description'    => "Riesgo de trabajo",
        ]);
        CatConceptImssDeduction::create([
            'id'             => 8,
            'description'    => "Seguro de retiro (Bimestral)",
        ]);
        CatConceptImssDeduction::create([
            'id'             => 9,
            'description'    => "Cesantia en edad avanzada y vejez (Bimestral)",
        ]);
        CatConceptImssDeduction::create([
            'id'             => 10,
            'description'    => "INFONAVIT (Bimestral)",
        ]);
    }
}
