<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReportsGroupSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('reports_group_section')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Datos generales',
                    'report_group_id' => 1                
                ],
                [
                    'id' => 2,
                    'name' => 'Datos de contacto',
                    'report_group_id' => 1              
                ],
                [
                    'id' => 3,
                    'name' => 'Contacto de emergencia',
                    'report_group_id' => 1                
                ],
                [
                    'id' => 4,
                    'name' => 'Direcciones',
                    'report_group_id' => 2                
                ],
                [
                    'id' => 5,
                    'name' => 'Experiencia',
                    'report_group_id' => 3                
                ],
                [
                    'id' => 6,
                    'name' => 'Educación',
                    'report_group_id' => 3                
                ],
                [
                    'id' => 7,
                    'name' => 'Certificaciones',
                    'report_group_id' => 3                
                ],
                [
                    'id' => 8,
                    'name' => 'Habilidades',
                    'report_group_id' => 3                
                ],
                [
                    'id' => 9,
                    'name' => 'Datos bancarios',
                    'report_group_id' => 4                
                ],
                [
                    'id' => 10,
                    'name' => 'Datos laborales',
                    'report_group_id' => 5                
                ],
                [
                    'id' => 11,
                    'name' => 'Datos generales',
                    'report_group_id' => 6          
                ],
                [
                    'id' => 12,
                    'name' => 'Datos generales',
                    'report_group_id' => 7          
                ],
           ]
        );

    }
}
