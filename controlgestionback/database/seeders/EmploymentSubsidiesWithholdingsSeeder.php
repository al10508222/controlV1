<?php

namespace Database\Seeders;

use App\Models\EmploymentSubsidiesWithholdings;
use Illuminate\Database\Seeder;

class EmploymentSubsidiesWithholdingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 1,
            'payroll_employment_subsidies_configs_id' => 4,
            'lower_limit'                             => 1,
            'upper_limit'                             => 176896,
            'subsidy'                                 => 40702
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 2,
            'payroll_employment_subsidies_configs_id' => 4,
            'lower_limit'                             => 176897,
            'upper_limit'                             => 265338,
            'subsidy'                                 => 40683
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 3,
            'payroll_employment_subsidies_configs_id' => 4,
            'lower_limit'                             => 265339,
            'upper_limit'                             => 347284,
            'subsidy'                                 => 40662
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 4,
            'payroll_employment_subsidies_configs_id' => 4,
            'lower_limit'                             => 347285,
            'upper_limit'                             => 353787,
            'subsidy'                                 => 39277
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 5,
            'payroll_employment_subsidies_configs_id' => 4,
            'lower_limit'                             => 353788,
            'upper_limit'                             => 444615,
            'subsidy'                                 => 38246
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 6,
            'payroll_employment_subsidies_configs_id' => 4,
            'lower_limit'                             => 444616,
            'upper_limit'                             => 471718,
            'subsidy'                                 => 35423
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 7,
            'payroll_employment_subsidies_configs_id' => 4,
            'lower_limit'                             => 471719,
            'upper_limit'                             => 533542,
            'subsidy'                                 => 32487
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 8,
            'payroll_employment_subsidies_configs_id' => 4,
            'lower_limit'                             => 533543,
            'upper_limit'                             => 622467,
            'subsidy'                                 => 29463
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 9,
            'payroll_employment_subsidies_configs_id' => 4,
            'lower_limit'                             => 622468,
            'upper_limit'                             => 711390,
            'subsidy'                                 => 25354
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 10,
            'payroll_employment_subsidies_configs_id' => 4,
            'lower_limit'                             => 711391,
            'upper_limit'                             => 738233,
            'subsidy'                                 => 21761
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 11,
            'payroll_employment_subsidies_configs_id' => 4,
            'lower_limit'                             => 738234,
            'upper_limit'                             => 999999,
            'subsidy'                                 => 0
        ]);

        // Subsidio quincenal
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 12,
            'payroll_employment_subsidies_configs_id' => 3,
            'lower_limit'                             => 1,
            'upper_limit'                             => 87285,
            'subsidy'                                 => 20085
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 13,
            'payroll_employment_subsidies_configs_id' => 3,
            'lower_limit'                             => 87286,
            'upper_limit'                             => 130920,
            'subsidy'                                 => 20070
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 14,
            'payroll_employment_subsidies_configs_id' => 3,
            'lower_limit'                             => 130921,
            'upper_limit'                             => 171360,
            'subsidy'                                 => 20070
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 15,
            'payroll_employment_subsidies_configs_id' => 3,
            'lower_limit'                             => 171361,
            'upper_limit'                             => 174570,
            'subsidy'                                 => 19380
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 16,
            'payroll_employment_subsidies_configs_id' => 3,
            'lower_limit'                             => 174571,
            'upper_limit'                             => 219375,
            'subsidy'                                 => 18870
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 17,
            'payroll_employment_subsidies_configs_id' => 3,
            'lower_limit'                             => 219376,
            'upper_limit'                             => 232755,
            'subsidy'                                 => 17475
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 18,
            'payroll_employment_subsidies_configs_id' => 3,
            'lower_limit'                             => 232756,
            'upper_limit'                             => 263265,
            'subsidy'                                 => 16035
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 19,
            'payroll_employment_subsidies_configs_id' => 3,
            'lower_limit'                             => 263266,
            'upper_limit'                             => 307140,
            'subsidy'                                 => 14535
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 20,
            'payroll_employment_subsidies_configs_id' => 3,
            'lower_limit'                             => 307141,
            'upper_limit'                             => 351015,
            'subsidy'                                 => 12510
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 21,
            'payroll_employment_subsidies_configs_id' => 3,
            'lower_limit'                             => 351016,
            'upper_limit'                             => 364260,
            'subsidy'                                 => 10740
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 22,
            'payroll_employment_subsidies_configs_id' => 3,
            'lower_limit'                             => 364261,
            'upper_limit'                             => 999999,
            'subsidy'                                 => 0
        ]);

        // subsidio semanal

        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 23,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 1,
            'upper_limit'                             => 40733,
            'subsidy'                                 => 9373
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 24,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 40734,
            'upper_limit'                             => 61096,
            'subsidy'                                 => 9366
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 25,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 61097,
            'upper_limit'                             => 79968,
            'subsidy'                                 => 9366
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 26,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 79969,
            'upper_limit'                             => 81466,
            'subsidy'                                 => 9044
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 27,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 81467,
            'upper_limit'                             => 102375,
            'subsidy'                                 => 8806
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 28,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 102376,
            'upper_limit'                             => 108619,
            'subsidy'                                 => 8155
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 29,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 108620,
            'upper_limit'                             => 122857,
            'subsidy'                                 => 7483
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 30,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 122858,
            'upper_limit'                             => 143332,
            'subsidy'                                 => 3783
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 31,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 143333,
            'upper_limit'                             => 163807,
            'subsidy'                                 => 5838
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 32,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 163808,
            'upper_limit'                             => 169988,
            'subsidy'                                 => 5012
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 33,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 169989,
            'upper_limit'                             => 999999,
            'subsidy'                                 => 0
        ]);

        // Subsidio al empleo diario

        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 34,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 1,
            'upper_limit'                             => 5819,
            'subsidy'                                 => 1339
        ]);

        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 35,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 5820,
            'upper_limit'                             => 8728,
            'subsidy'                                 => 1338
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 36,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 8729,
            'upper_limit'                             => 11424,
            'subsidy'                                 => 1338
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 37,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 11425,
            'upper_limit'                             => 11638,
            'subsidy'                                 => 1292
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 38,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 11639,
            'upper_limit'                             => 14625,
            'subsidy'                                 => 1258
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 39,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 14626,
            'upper_limit'                             => 15517,
            'subsidy'                                 => 1165
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 40,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 15518,
            'upper_limit'                             => 17551,
            'subsidy'                                 => 1069
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 41,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 17552,
            'upper_limit'                             => 20476,
            'subsidy'                                 => 969
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 42,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 20477,
            'upper_limit'                             => 23401,
            'subsidy'                                 => 834
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 43,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 23402,
            'upper_limit'                             => 24284,
            'subsidy'                                 => 716
        ]);
        EmploymentSubsidiesWithholdings::create([
            'id'                                      => 44,
            'payroll_employment_subsidies_configs_id' => 2,
            'lower_limit'                             => 24285,
            'upper_limit'                             => 99999,
            'subsidy'                                 => 0
        ]);

    }
}
