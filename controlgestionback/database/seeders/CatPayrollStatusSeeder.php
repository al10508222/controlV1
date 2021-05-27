<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatPayrollStatus;

class CatPayrollStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatPayrollStatus::create([
            'id'                =>  1,
            'name'              =>  'CREADA',
        ]);
        CatPayrollStatus::create([
            'id'                => 2,
            'name'              => 'EN EJECUCIÓN',
        ]);
        CatPayrollStatus::create([
            'id'                => 3,
            'name'              => 'FINALIZADA',
        ]);
        CatPayrollStatus::create([
            'id'                => 4,
            'name'              => 'FALLIDA',
        ]);
        CatPayrollStatus::create([
            'id'                => 5,
            'name'              => 'CANCELADA',
        ]);
        CatPayrollStatus::create([
            'id'                => 6,
            'name'              => 'VALIDADA',
        ]);
    }
}
