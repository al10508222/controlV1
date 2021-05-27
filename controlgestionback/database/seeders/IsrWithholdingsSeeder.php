<?php

namespace Database\Seeders;

use App\Models\IsrWithholdings;
use Illuminate\Database\Seeder;

class IsrWithholdingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     */
    public function run()
    {
        // TODO:
        // ISR Mensual
        IsrWithholdings::create([
            'id'                          => 1,
            'payrolls_isr_config_id'      => 4,
            'lower_limit'                 => 1,
            'upper_limit'                 => 57852,
            'fixed_fee'                   => 0,
            'percent_over_lower_limit'    => 1.92
        ]);
        IsrWithholdings::create([
            'id'                          => 2,
            'payrolls_isr_config_id'      => 4,
            'lower_limit'                 => 57853,
            'upper_limit'                 => 491018,
            'fixed_fee'                   => 1111,
            'percent_over_lower_limit'    => 6.40
        ]);
        IsrWithholdings::create([
            'id'                          => 3,
            'payrolls_isr_config_id'      => 4,
            'lower_limit'                 => 491019,
            'upper_limit'                 => 862920,
            'fixed_fee'                   => 28833,
            'percent_over_lower_limit'    => 10.88
        ]);
        IsrWithholdings::create([
            'id'                          => 4,
            'payrolls_isr_config_id'      => 4,
            'lower_limit'                 => 862921,
            'upper_limit'                 => 1003107,
            'fixed_fee'                   => 69296,
            'percent_over_lower_limit'    => 16.00
        ]);
        IsrWithholdings::create([
            'id'                          => 5,
            'payrolls_isr_config_id'      => 4,
            'lower_limit'                 => 1003108,
            'upper_limit'                 => 1200994,
            'fixed_fee'                   => 91726,
            'percent_over_lower_limit'    => 17.92
        ]);
        IsrWithholdings::create([
            'id'                          => 6,
            'payrolls_isr_config_id'      => 4,
            'lower_limit'                 => 1200995,
            'upper_limit'                 => 2422231,
            'fixed_fee'                   => 127187,
            'percent_over_lower_limit'    => 21.36
        ]);
        IsrWithholdings::create([
            'id'                          => 7,
            'payrolls_isr_config_id'      => 4,
            'lower_limit'                 => 2422232,
            'upper_limit'                 => 3817769,
            'fixed_fee'                   => 388044,
            'percent_over_lower_limit'    => 23.52
        ]);
        IsrWithholdings::create([
            'id'                          => 8,
            'payrolls_isr_config_id'      => 4,
            'lower_limit'                 => 3817770,
            'upper_limit'                 => 7288750,
            'fixed_fee'                   => 716274,
            'percent_over_lower_limit'    => 30.00
        ]);
        IsrWithholdings::create([
            'id'                          => 9,
            'payrolls_isr_config_id'      => 4,
            'lower_limit'                 => 7288751,
            'upper_limit'                 => 9718333,
            'fixed_fee'                   => 1757569,
            'percent_over_lower_limit'    => 32.00
        ]);
        IsrWithholdings::create([
            'id'                          => 10,
            'payrolls_isr_config_id'      => 4,
            'lower_limit'                 => 9718334,
            'upper_limit'                 => 29155000,
            'fixed_fee'                   => 2535035,
            'percent_over_lower_limit'    => 34.00
        ]);
        IsrWithholdings::create([
            'id'                          => 11,
            'payrolls_isr_config_id'      => 4,
            'lower_limit'                 => 29155001,
            'upper_limit'                 => 99999999,
            'fixed_fee'                   => 9143502,
            'percent_over_lower_limit'    => 35.00
        ]);

        // ISR Quincenal
        IsrWithholdings::create([
            'id'                          => 12,
            'payrolls_isr_config_id'      => 3,
            'lower_limit'                 => 1,
            'upper_limit'                 => 28545,
            'fixed_fee'                   => 0,
            'percent_over_lower_limit'    => 1.92
        ]);
        IsrWithholdings::create([
            'id'                          => 13,
            'payrolls_isr_config_id'      => 3,
            'lower_limit'                 => 28546,
            'upper_limit'                 => 242280,
            'fixed_fee'                   => 555,
            'percent_over_lower_limit'    => 6.40
        ]);
        IsrWithholdings::create([
            'id'                          => 14,
            'payrolls_isr_config_id'      => 3,
            'lower_limit'                 => 242281,
            'upper_limit'                 => 425790,
            'fixed_fee'                   => 14220,
            'percent_over_lower_limit'    => 10.88
        ]);
        IsrWithholdings::create([
            'id'                          => 15,
            'payrolls_isr_config_id'      => 3,
            'lower_limit'                 => 425791,
            'upper_limit'                 => 494955,
            'fixed_fee'                   => 34185,
            'percent_over_lower_limit'    => 16.00
        ]);
        IsrWithholdings::create([
            'id'                          => 16,
            'payrolls_isr_config_id'      => 3,
            'lower_limit'                 => 494956,
            'upper_limit'                 => 592590,
            'fixed_fee'                   => 45255,
            'percent_over_lower_limit'    => 17.92
        ]);
        IsrWithholdings::create([
            'id'                          => 17,
            'payrolls_isr_config_id'      => 3,
            'lower_limit'                 => 592591,
            'upper_limit'                 => 1195185,
            'fixed_fee'                   => 62760,
            'percent_over_lower_limit'    => 21.36
        ]);
        IsrWithholdings::create([
            'id'                          => 18,
            'payrolls_isr_config_id'      => 3,
            'lower_limit'                 => 1195186,
            'upper_limit'                 => 1883775,
            'fixed_fee'                   => 191475,
            'percent_over_lower_limit'    => 23.52
        ]);
        IsrWithholdings::create([
            'id'                          => 19,
            'payrolls_isr_config_id'      => 3,
            'lower_limit'                 => 1883776,
            'upper_limit'                 => 3596430,
            'fixed_fee'                   => 353430,
            'percent_over_lower_limit'    => 30.00
        ]);
        IsrWithholdings::create([
            'id'                          => 20,
            'payrolls_isr_config_id'      => 3,
            'lower_limit'                 => 3596431,
            'upper_limit'                 => 4795230,
            'fixed_fee'                   => 867225,
            'percent_over_lower_limit'    => 32.00
        ]);
        IsrWithholdings::create([
            'id'                          => 21,
            'payrolls_isr_config_id'      => 3,
            'lower_limit'                 => 4795231,
            'upper_limit'                 => 14385690,
            'fixed_fee'                   => 1250835,
            'percent_over_lower_limit'    => 34.00
        ]);
        IsrWithholdings::create([
            'id'                          => 22,
            'payrolls_isr_config_id'      => 3,
            'lower_limit'                 => 14385691,
            'upper_limit'                 => 99999999,
            'fixed_fee'                   => 4511595,
            'percent_over_lower_limit'    => 35.00
        ]);

        // ISR Semanal

        IsrWithholdings::create([
            'id'                          => 23,
            'payrolls_isr_config_id'      => 2,
            'lower_limit'                 => 1,
            'upper_limit'                 => 13321,
            'fixed_fee'                   => 0,
            'percent_over_lower_limit'    => 1.92
        ]);
        IsrWithholdings::create([
            'id'                          => 24,
            'payrolls_isr_config_id'      => 2,
            'lower_limit'                 => 13322,
            'upper_limit'                 => 112064,
            'fixed_fee'                   => 259,
            'percent_over_lower_limit'    => 6.40
        ]);
        IsrWithholdings::create([
            'id'                          => 25,
            'payrolls_isr_config_id'      => 2,
            'lower_limit'                 => 113065,
            'upper_limit'                 => 198702,
            'fixed_fee'                   => 6636,
            'percent_over_lower_limit'    => 10.88
        ]);
        IsrWithholdings::create([
            'id'                          => 26,
            'payrolls_isr_config_id'      => 2,
            'lower_limit'                 => 198703,
            'upper_limit'                 => 230979,
            'fixed_fee'                   => 15953,
            'percent_over_lower_limit'    => 16.00
        ]);
        IsrWithholdings::create([
            'id'                          => 27,
            'payrolls_isr_config_id'      => 2,
            'lower_limit'                 => 230980,
            'upper_limit'                 => 276542,
            'fixed_fee'                   => 21119,
            'percent_over_lower_limit'    => 17.92
        ]);
        IsrWithholdings::create([
            'id'                          => 28,
            'payrolls_isr_config_id'      => 2,
            'lower_limit'                 => 276543,
            'upper_limit'                 => 557753,
            'fixed_fee'                   => 29288,
            'percent_over_lower_limit'    => 21.36
        ]);
        IsrWithholdings::create([
            'id'                          => 29,
            'payrolls_isr_config_id'      => 2,
            'lower_limit'                 => 557754,
            'upper_limit'                 => 879095,
            'fixed_fee'                   => 89355,
            'percent_over_lower_limit'    => 23.52
        ]);
        IsrWithholdings::create([
            'id'                          => 30,
            'payrolls_isr_config_id'      => 2,
            'lower_limit'                 => 879096,
            'upper_limit'                 => 1678334,
            'fixed_fee'                   => 164934,
            'percent_over_lower_limit'    => 30.00
        ]);
        IsrWithholdings::create([
            'id'                          => 31,
            'payrolls_isr_config_id'      => 2,
            'lower_limit'                 => 1678335,
            'upper_limit'                 => 2237774,
            'fixed_fee'                   => 404705,
            'percent_over_lower_limit'    => 32.00
        ]);
        IsrWithholdings::create([
            'id'                          => 32,
            'payrolls_isr_config_id'      => 2,
            'lower_limit'                 => 2237775,
            'upper_limit'                 => 6713322,
            'fixed_fee'                   => 583723,
            'percent_over_lower_limit'    => 34.00
        ]);
        IsrWithholdings::create([
            'id'                          => 33,
            'payrolls_isr_config_id'      => 2,
            'lower_limit'                 => 6713323,
            'upper_limit'                 => 9999999,
            'fixed_fee'                   => 2105411,
            'percent_over_lower_limit'    => 35.00
        ]);


        //ISR Diario
        IsrWithholdings::create([
            'id'                          => 34,
            'payrolls_isr_config_id'      => 1,
            'lower_limit'                 => 1,
            'upper_limit'                 => 1903,
            'fixed_fee'                   => 0,
            'percent_over_lower_limit'    => 1.92
        ]);
        IsrWithholdings::create([
            'id'                          => 35,
            'payrolls_isr_config_id'      => 1,
            'lower_limit'                 => 1904,
            'upper_limit'                 => 16152,
            'fixed_fee'                   => 37,
            'percent_over_lower_limit'    => 6.40
        ]);
        IsrWithholdings::create([
            'id'                          => 36,
            'payrolls_isr_config_id'      => 1,
            'lower_limit'                 => 16153,
            'upper_limit'                 => 28386,
            'fixed_fee'                   => 948,
            'percent_over_lower_limit'    => 10.88
        ]);
        IsrWithholdings::create([
            'id'                          => 37,
            'payrolls_isr_config_id'      => 1,
            'lower_limit'                 => 28387,
            'upper_limit'                 => 32997,
            'fixed_fee'                   => 2279,
            'percent_over_lower_limit'    => 16.00
        ]);
        IsrWithholdings::create([
            'id'                          => 38,
            'payrolls_isr_config_id'      => 1,
            'lower_limit'                 => 32998,
            'upper_limit'                 => 39506,
            'fixed_fee'                   => 3017,
            'percent_over_lower_limit'    => 17.92
        ]);
        IsrWithholdings::create([
            'id'                          => 39,
            'payrolls_isr_config_id'      => 1,
            'lower_limit'                 => 39507,
            'upper_limit'                 => 79679,
            'fixed_fee'                   => 4184,
            'percent_over_lower_limit'    => 21.36
        ]);
        IsrWithholdings::create([
            'id'                          => 40,
            'payrolls_isr_config_id'      => 1,
            'lower_limit'                 => 79680,
            'upper_limit'                 => 125585,
            'fixed_fee'                   => 12765,
            'percent_over_lower_limit'    => 23.52
        ]);
        IsrWithholdings::create([
            'id'                          => 41,
            'payrolls_isr_config_id'      => 1,
            'lower_limit'                 => 125586,
            'upper_limit'                 => 239762,
            'fixed_fee'                   => 23562,
            'percent_over_lower_limit'    => 30.00
        ]);
        IsrWithholdings::create([
            'id'                          => 42,
            'payrolls_isr_config_id'      => 1,
            'lower_limit'                 => 239763,
            'upper_limit'                 => 319682,
            'fixed_fee'                   => 57815,
            'percent_over_lower_limit'    => 32.00
        ]);
        IsrWithholdings::create([
            'id'                          => 43,
            'payrolls_isr_config_id'      => 1,
            'lower_limit'                 => 319683,
            'upper_limit'                 => 959046,
            'fixed_fee'                   => 83389,
            'percent_over_lower_limit'    => 34.00
        ]);
        IsrWithholdings::create([
            'id'                          => 44,
            'payrolls_isr_config_id'      => 1,
            'lower_limit'                 => 959047,
            'upper_limit'                 => 999999,
            'fixed_fee'                   => 300773,
            'percent_over_lower_limit'    => 35.00
        ]);
        
        \DB::statement('ALTER SEQUENCE isr_withholdings_id_seq RESTART WITH 45');
    }
}
