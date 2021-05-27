<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class LawVacationsConfigsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('law_vacations_configs')->delete();
        
        \DB::table('law_vacations_configs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'law_vacations_id' => 1,
                'days' => 6,
                'from' => 0,
                'to' => 1,
                'created_at' => '2021-03-31 18:27:05',
                'updated_at' => '2021-03-31 18:27:05',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'law_vacations_id' => 1,
                'days' => 8,
                'from' => 1,
                'to' => 2,
                'created_at' => '2021-03-31 18:27:05',
                'updated_at' => '2021-03-31 18:27:05',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'law_vacations_id' => 1,
                'days' => 10,
                'from' => 2,
                'to' => 3,
                'created_at' => '2021-03-31 18:27:05',
                'updated_at' => '2021-03-31 18:27:05',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'law_vacations_id' => 1,
                'days' => 12,
                'from' => 3,
                'to' => 4,
                'created_at' => '2021-03-31 18:27:05',
                'updated_at' => '2021-03-31 18:27:05',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'law_vacations_id' => 1,
                'days' => 14,
                'from' => 5,
                'to' => 9,
                'created_at' => '2021-03-31 18:27:05',
                'updated_at' => '2021-03-31 18:27:05',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'law_vacations_id' => 1,
                'days' => 16,
                'from' => 10,
                'to' => 14,
                'created_at' => '2021-03-31 18:27:05',
                'updated_at' => '2021-03-31 18:27:05',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'law_vacations_id' => 1,
                'days' => 20,
                'from' => 20,
                'to' => 24,
                'created_at' => '2021-03-31 18:27:05',
                'updated_at' => '2021-03-31 18:27:05',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'law_vacations_id' => 1,
                'days' => 22,
                'from' => 25,
                'to' => 29,
                'created_at' => '2021-03-31 18:27:05',
                'updated_at' => '2021-03-31 18:27:05',
                'deleted_at' => NULL,
            ),
        ));
        
        \DB::statement('ALTER SEQUENCE law_vacations_configs_id_seq RESTART WITH 10');
        
    }
}