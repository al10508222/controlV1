<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class FiveYearBonusConfigsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('five_year_bonus_configs')->delete();
        
        \DB::table('five_year_bonus_configs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'five_year_bonuses_id' => 1,
                'initial_period' => 5,
                'final_period' => 10,
                'monthly_amount' => 160,
                'created_at' => '2021-03-31 18:56:15',
                'updated_at' => '2021-03-31 18:56:15',
            ),
            1 => 
            array (
                'id' => 2,
                'five_year_bonuses_id' => 1,
                'initial_period' => 10,
                'final_period' => 15,
                'monthly_amount' => 185,
                'created_at' => '2021-03-31 18:56:15',
                'updated_at' => '2021-03-31 18:56:15',
            ),
            2 => 
            array (
                'id' => 3,
                'five_year_bonuses_id' => 1,
                'initial_period' => 15,
                'final_period' => 20,
                'monthly_amount' => 235,
                'created_at' => '2021-03-31 18:56:15',
                'updated_at' => '2021-03-31 18:56:15',
            ),
            3 => 
            array (
                'id' => 4,
                'five_year_bonuses_id' => 1,
                'initial_period' => 20,
                'final_period' => 25,
                'monthly_amount' => 260,
                'created_at' => '2021-03-31 18:56:15',
                'updated_at' => '2021-03-31 18:56:15',
            ),
        ));
        
        \DB::statement('ALTER SEQUENCE five_year_bonus_configs_id_seq RESTART WITH 5');
    }
}