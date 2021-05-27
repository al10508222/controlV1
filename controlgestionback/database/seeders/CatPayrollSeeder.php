<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatPayRoll;

class CatPayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatPayroll::create([
            'name' => 'Díaria',
            'days' => 1
        ]);
        CatPayroll::create([
            'name' => 'Semanal',
            'days' => '5'
        ]);
        CatPayroll::create([
            'name' => 'Quincenal',
            'days' => '15'
        ]);
        CatPayroll::create([
            'name'=>'Mensual',
            'days' => 30
        ]);
        CatPayroll::create([
           'name' => 'Extraordinaria',
           'days' => 0
        ]);
    }
}
