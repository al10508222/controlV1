<?php

namespace Database\Seeders;

use App\Models\Catalogs\CatPeriodicityType;
use Illuminate\Database\Seeder;

class CatPeriodicityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
// 06	Bimestral
// 07	Unidad obra
// 08	Comisión
// 09	Precio alzado
// 10	Decenal
// 99	Otra Periodicidad
        CatPeriodicityType::create([
            'id'                => 1,
            'name'              => 'Diaria',
            'sat_identifier'    => '01',
            'days' => 1
        ]);
        CatPeriodicityType::create([
            'id'                => 2,
            'sat_identifier'    => '02',
            'name'              => 'Semanal',
            'days' => '5'
        ]);
        CatPeriodicityType::create([
            'id'                => 3,
            'sat_identifier'    => '03',
            'name'              => 'Catorcenal',
            'days' => 14
        ]);
        CatPeriodicityType::create([
            'id'                => 4,
            'sat_identifier'    => '04',
            'name'              => 'Quincenal',
            'days' => '15'
        ]);
        CatPeriodicityType::create([
            'id'                => 5,
            'sat_identifier'    => '05',
            'name'              => 'Mensual',
            'days' => 30
        ]);
        CatPeriodicityType::create([
            'id'                => 6,
            'sat_identifier'    => '06',
            'name'              => 'Bimestral',
            'days' => 60
        ]);
        CatPeriodicityType::create([
            'id'                => 7,
            'sat_identifier'    => '07',
            'name'              => 'Unidad obra',
            'days' => 0
        ]);
        CatPeriodicityType::create([
            'id'                => 8,
            'sat_identifier'    => '08',
            'name'              => 'Comisión',
            'days' => 0
        ]);
        CatPeriodicityType::create([
            'id'                => 9,
            'sat_identifier'    => '09',
            'name'              => 'Precio Alzado',
            'days' => 0
        ]);
        CatPeriodicityType::create([
            'id'                => 10,
            'sat_identifier'    => '99',
            'name'              => 'Otra periodicidad',
            'days' => 0
        ]);
    }
}
