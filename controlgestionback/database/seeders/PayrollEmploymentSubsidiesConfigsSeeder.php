<?php

namespace Database\Seeders;

use App\Models\PayrollEmploymentSubsidies;
use Illuminate\Database\Seeder;

class PayrollEmploymentSubsidiesConfigsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PayrollEmploymentSubsidies::create([
            'id'             => 1,
            'name'           => 'Subsidio al empleo diario 2020',
            'year'           => 2020,
            'cat_periodicity_type_id' => 1
        ]);
        PayrollEmploymentSubsidies::create([
            'id'             => 2,
            'name'           => 'Subsidio al empleo semanal 2020',
            'year'           => 2020,
            'cat_periodicity_type_id' => 2
        ]);
        PayrollEmploymentSubsidies::create([
            'id'             => 3,
            'name'           => 'Subsidio al empleo quincenal 2020',
            'year'           => 2020,
            'cat_periodicity_type_id' => 4
        ]);
        PayrollEmploymentSubsidies::create([
            'id'             => 4,
            'name'           => 'Subsidio al empleo mensual 2020',
            'year'           => 2020,
            'cat_periodicity_type_id' => 5
        ]);

        \DB::statement('ALTER SEQUENCE payroll_employment_subsidies_configs_id_seq RESTART WITH 6');
    }
}
