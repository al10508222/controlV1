<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatEmployeeIncidentType;

class CatEmployeeIncidentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatEmployeeIncidentType::create([
            'id' => 1,
            'name' => 'Ausentismo',
        ]);
        CatEmployeeIncidentType::create([
            'id' => 2,
            'name' => 'Incapacidad',
        ]);
        CatEmployeeIncidentType::create([
            'id' => 3,
            'name' => 'Permiso con goce de sueldo',
        ]);
        CatEmployeeIncidentType::create([
            'id' => 4,
            'name' => 'Permiso sin goce de sueldo',
        ]);
    }
}
