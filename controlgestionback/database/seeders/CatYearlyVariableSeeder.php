<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatYearlyVariable;

class CatYearlyVariableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $UMA = 1;
        $YEAR_DAYS = 2;
        $ISN = 3;
        
        CatYearlyVariable::create([
            'id' => 1,
            'value' => 86.88,
            'year' => 2020,
            'cat_yearly_variable_type_id' => $UMA
        ]);
        CatYearlyVariable::create([
            'id' => 2,
            'value' => 89.62,
            'year' => 2021,
            'cat_yearly_variable_type_id' => $UMA
        ]);
        CatYearlyVariable::create([
            'id' => 3,
            'value' => 365,
            'year' => 2021,
            'cat_yearly_variable_type_id' => $YEAR_DAYS
        ]);
        CatYearlyVariable::create([
            'id' => 4,
            'value' => 0.03,
            'year' => 2021,
            'cat_yearly_variable_type_id' => $ISN
        ]);
    }
}
