<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class PayrollIsrConfigsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payroll_isr_configs')->delete();
        
        \DB::table('payroll_isr_configs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'cat_periodicity_type_id' => 1,
                'name' => 'ISR Diario 2020',
                'year' => '2020',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            1 => 
            array (
                'id' => 2,
                'cat_periodicity_type_id' => 2,
                'name' => 'ISR Semanal 2020',
                'year' => '2020',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            2 => 
            array (
                'id' => 3,
                'cat_periodicity_type_id' => 4,
                'name' => 'ISR Quincenal 2020',
                'year' => '2020',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            3 => 
            array (
                'id' => 4,
                'cat_periodicity_type_id' => 5,
                'name' => 'ISR Mensual 2020',
                'year' => '2020',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            4 => 
            array (
                'id' => 5,
                'cat_periodicity_type_id' => 1,
                'name' => 'ISR Diario 2021',
                'year' => '2021',
                'created_at' => '2021-01-13 00:41:19',
                'updated_at' => '2021-01-13 00:41:19',
            ),
            5 => 
            array (
                'id' => 15,
                'cat_periodicity_type_id' => 2,
                'name' => 'ISR Semanal 2021',
                'year' => '2021',
                'created_at' => '2021-01-13 01:21:29',
                'updated_at' => '2021-01-13 01:21:29',
            ),
            6 => 
            array (
                'id' => 16,
                'cat_periodicity_type_id' => 4,
                'name' => 'ISR Quincenal 2021',
                'year' => '2021',
                'created_at' => '2021-01-13 01:29:21',
                'updated_at' => '2021-01-13 01:29:21',
            ),
            7 => 
            array (
                'id' => 17,
                'cat_periodicity_type_id' => 5,
                'name' => 'ISR Mensual 2021',
                'year' => '2021',
                'created_at' => '2021-01-13 01:41:50',
                'updated_at' => '2021-01-13 01:41:50',
            ),
        ));

        \DB::statement('ALTER SEQUENCE payroll_isr_configs_id_seq RESTART WITH 18');
        
        
    }
}