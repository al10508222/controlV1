<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReportsGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('reports_group')->insert(
            [
                [
                    'id' => 1,
                    'name' =>'Datos personales',
                ],
                [
                    'id' => 2,
                    'name' =>'Direcciones',
                ],
                [
                    'id' => 3,
                    'name' =>'Datos profesionales',
                ],
                [
                    'id' => 4,
                    'name' =>'Datos bancarios',
                ],
                [
                    'id' => 5,
                    'name'=>'Datos laborales',
                ],
                [
                    'id' => 6,
                    'name'=>'Puestos',
                ],
                [
                    'id' => 7,
                    'name'=>'Pre-Nómina',
                ],
           ]
        );
        
     }
}
