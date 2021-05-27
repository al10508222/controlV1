<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatEmployeeIncidentInabilityType;

class CatEmployeeIncidentInabilityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatEmployeeIncidentInabilityType::create([
            'id' => 1,
            'name' => 'Riesgo de trabajo',
        ]);
        CatEmployeeIncidentInabilityType::create([
            'id' => 2,
            'name' => 'Enfermedad general',
        ]);
        CatEmployeeIncidentInabilityType::create([
            'id' => 3,
            'name' => 'Maternidad',
        ]);
    }
}
