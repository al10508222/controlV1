<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatConceptIsssteDeduction;

class CatConceptIsssteDeductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatConceptIsssteDeduction::create([
            'id'             => 1,
            'description'    => "Trabajadores en Activo y Familiares Derechohabientes",
        ]);
        CatConceptIsssteDeduction::create([
            'id'             => 2,
            'description'    => "Pensionados y Familiares Derechohabientes",
        ]);
        CatConceptIsssteDeduction::create([
            'id'             => 3,
            'description'    => "Seguro de Riesgo de Trabajo",
        ]);
        CatConceptIsssteDeduction::create([
            'id'             => 4,
            'description'    => "Retiro",
        ]);
        CatConceptIsssteDeduction::create([
            'id'             => 5,
            'description'    => "Cesantía en Edad Avanzada y Vejez",
        ]);
        CatConceptIsssteDeduction::create([
            'id'             => 6,
            'description'    => "Invalidez y Vida",
        ]);
        CatConceptIsssteDeduction::create([
            'id'             => 7,
            'description'    => "Fondo de Vivienda",
        ]);
        CatConceptIsssteDeduction::create([
            'id'             => 8,
            'description'    => "Servicios Sociales y Culturales",
        ]);
    }
}
