<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class IsrWithholdingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('isr_withholdings')->delete();
        
        \DB::table('isr_withholdings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'payrolls_isr_config_id' => 4,
                'lower_limit' => 1,
                'upper_limit' => 57852,
                'fixed_fee' => 0,
                'percent_over_lower_limit' => '1.92',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            1 => 
            array (
                'id' => 2,
                'payrolls_isr_config_id' => 4,
                'lower_limit' => 57853,
                'upper_limit' => 491018,
                'fixed_fee' => 1111,
                'percent_over_lower_limit' => '6.40',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            2 => 
            array (
                'id' => 3,
                'payrolls_isr_config_id' => 4,
                'lower_limit' => 491019,
                'upper_limit' => 862920,
                'fixed_fee' => 28833,
                'percent_over_lower_limit' => '10.88',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            3 => 
            array (
                'id' => 4,
                'payrolls_isr_config_id' => 4,
                'lower_limit' => 862921,
                'upper_limit' => 1003107,
                'fixed_fee' => 69296,
                'percent_over_lower_limit' => '16.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            4 => 
            array (
                'id' => 5,
                'payrolls_isr_config_id' => 4,
                'lower_limit' => 1003108,
                'upper_limit' => 1200994,
                'fixed_fee' => 91726,
                'percent_over_lower_limit' => '17.92',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            5 => 
            array (
                'id' => 6,
                'payrolls_isr_config_id' => 4,
                'lower_limit' => 1200995,
                'upper_limit' => 2422231,
                'fixed_fee' => 127187,
                'percent_over_lower_limit' => '21.36',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            6 => 
            array (
                'id' => 7,
                'payrolls_isr_config_id' => 4,
                'lower_limit' => 2422232,
                'upper_limit' => 3817769,
                'fixed_fee' => 388044,
                'percent_over_lower_limit' => '23.52',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            7 => 
            array (
                'id' => 8,
                'payrolls_isr_config_id' => 4,
                'lower_limit' => 3817770,
                'upper_limit' => 7288750,
                'fixed_fee' => 716274,
                'percent_over_lower_limit' => '30.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            8 => 
            array (
                'id' => 9,
                'payrolls_isr_config_id' => 4,
                'lower_limit' => 7288751,
                'upper_limit' => 9718333,
                'fixed_fee' => 1757569,
                'percent_over_lower_limit' => '32.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            9 => 
            array (
                'id' => 10,
                'payrolls_isr_config_id' => 4,
                'lower_limit' => 9718334,
                'upper_limit' => 29155000,
                'fixed_fee' => 2535035,
                'percent_over_lower_limit' => '34.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            10 => 
            array (
                'id' => 11,
                'payrolls_isr_config_id' => 4,
                'lower_limit' => 29155001,
                'upper_limit' => 99999999,
                'fixed_fee' => 9143502,
                'percent_over_lower_limit' => '35.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            11 => 
            array (
                'id' => 12,
                'payrolls_isr_config_id' => 3,
                'lower_limit' => 1,
                'upper_limit' => 28545,
                'fixed_fee' => 0,
                'percent_over_lower_limit' => '1.92',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            12 => 
            array (
                'id' => 13,
                'payrolls_isr_config_id' => 3,
                'lower_limit' => 28546,
                'upper_limit' => 242280,
                'fixed_fee' => 555,
                'percent_over_lower_limit' => '6.40',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            13 => 
            array (
                'id' => 14,
                'payrolls_isr_config_id' => 3,
                'lower_limit' => 242281,
                'upper_limit' => 425790,
                'fixed_fee' => 14220,
                'percent_over_lower_limit' => '10.88',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            14 => 
            array (
                'id' => 15,
                'payrolls_isr_config_id' => 3,
                'lower_limit' => 425791,
                'upper_limit' => 494955,
                'fixed_fee' => 34185,
                'percent_over_lower_limit' => '16.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            15 => 
            array (
                'id' => 16,
                'payrolls_isr_config_id' => 3,
                'lower_limit' => 494956,
                'upper_limit' => 592590,
                'fixed_fee' => 45255,
                'percent_over_lower_limit' => '17.92',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            16 => 
            array (
                'id' => 17,
                'payrolls_isr_config_id' => 3,
                'lower_limit' => 592591,
                'upper_limit' => 1195185,
                'fixed_fee' => 62760,
                'percent_over_lower_limit' => '21.36',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            17 => 
            array (
                'id' => 18,
                'payrolls_isr_config_id' => 3,
                'lower_limit' => 1195186,
                'upper_limit' => 1883775,
                'fixed_fee' => 191475,
                'percent_over_lower_limit' => '23.52',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            18 => 
            array (
                'id' => 19,
                'payrolls_isr_config_id' => 3,
                'lower_limit' => 1883776,
                'upper_limit' => 3596430,
                'fixed_fee' => 353430,
                'percent_over_lower_limit' => '30.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            19 => 
            array (
                'id' => 20,
                'payrolls_isr_config_id' => 3,
                'lower_limit' => 3596431,
                'upper_limit' => 4795230,
                'fixed_fee' => 867225,
                'percent_over_lower_limit' => '32.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            20 => 
            array (
                'id' => 21,
                'payrolls_isr_config_id' => 3,
                'lower_limit' => 4795231,
                'upper_limit' => 14385690,
                'fixed_fee' => 1250835,
                'percent_over_lower_limit' => '34.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            21 => 
            array (
                'id' => 22,
                'payrolls_isr_config_id' => 3,
                'lower_limit' => 14385691,
                'upper_limit' => 99999999,
                'fixed_fee' => 4511595,
                'percent_over_lower_limit' => '35.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            22 => 
            array (
                'id' => 23,
                'payrolls_isr_config_id' => 2,
                'lower_limit' => 1,
                'upper_limit' => 13321,
                'fixed_fee' => 0,
                'percent_over_lower_limit' => '1.92',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            23 => 
            array (
                'id' => 24,
                'payrolls_isr_config_id' => 2,
                'lower_limit' => 13322,
                'upper_limit' => 112064,
                'fixed_fee' => 259,
                'percent_over_lower_limit' => '6.40',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            24 => 
            array (
                'id' => 25,
                'payrolls_isr_config_id' => 2,
                'lower_limit' => 113065,
                'upper_limit' => 198702,
                'fixed_fee' => 6636,
                'percent_over_lower_limit' => '10.88',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            25 => 
            array (
                'id' => 26,
                'payrolls_isr_config_id' => 2,
                'lower_limit' => 198703,
                'upper_limit' => 230979,
                'fixed_fee' => 15953,
                'percent_over_lower_limit' => '16.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            26 => 
            array (
                'id' => 27,
                'payrolls_isr_config_id' => 2,
                'lower_limit' => 230980,
                'upper_limit' => 276542,
                'fixed_fee' => 21119,
                'percent_over_lower_limit' => '17.92',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            27 => 
            array (
                'id' => 28,
                'payrolls_isr_config_id' => 2,
                'lower_limit' => 276543,
                'upper_limit' => 557753,
                'fixed_fee' => 29288,
                'percent_over_lower_limit' => '21.36',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            28 => 
            array (
                'id' => 29,
                'payrolls_isr_config_id' => 2,
                'lower_limit' => 557754,
                'upper_limit' => 879095,
                'fixed_fee' => 89355,
                'percent_over_lower_limit' => '23.52',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            29 => 
            array (
                'id' => 30,
                'payrolls_isr_config_id' => 2,
                'lower_limit' => 879096,
                'upper_limit' => 1678334,
                'fixed_fee' => 164934,
                'percent_over_lower_limit' => '30.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            30 => 
            array (
                'id' => 31,
                'payrolls_isr_config_id' => 2,
                'lower_limit' => 1678335,
                'upper_limit' => 2237774,
                'fixed_fee' => 404705,
                'percent_over_lower_limit' => '32.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            31 => 
            array (
                'id' => 32,
                'payrolls_isr_config_id' => 2,
                'lower_limit' => 2237775,
                'upper_limit' => 6713322,
                'fixed_fee' => 583723,
                'percent_over_lower_limit' => '34.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            32 => 
            array (
                'id' => 33,
                'payrolls_isr_config_id' => 2,
                'lower_limit' => 6713323,
                'upper_limit' => 9999999,
                'fixed_fee' => 2105411,
                'percent_over_lower_limit' => '35.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            33 => 
            array (
                'id' => 34,
                'payrolls_isr_config_id' => 1,
                'lower_limit' => 1,
                'upper_limit' => 1903,
                'fixed_fee' => 0,
                'percent_over_lower_limit' => '1.92',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            34 => 
            array (
                'id' => 35,
                'payrolls_isr_config_id' => 1,
                'lower_limit' => 1904,
                'upper_limit' => 16152,
                'fixed_fee' => 37,
                'percent_over_lower_limit' => '6.40',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            35 => 
            array (
                'id' => 36,
                'payrolls_isr_config_id' => 1,
                'lower_limit' => 16153,
                'upper_limit' => 28386,
                'fixed_fee' => 948,
                'percent_over_lower_limit' => '10.88',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            36 => 
            array (
                'id' => 37,
                'payrolls_isr_config_id' => 1,
                'lower_limit' => 28387,
                'upper_limit' => 32997,
                'fixed_fee' => 2279,
                'percent_over_lower_limit' => '16.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            37 => 
            array (
                'id' => 38,
                'payrolls_isr_config_id' => 1,
                'lower_limit' => 32998,
                'upper_limit' => 39506,
                'fixed_fee' => 3017,
                'percent_over_lower_limit' => '17.92',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            38 => 
            array (
                'id' => 39,
                'payrolls_isr_config_id' => 1,
                'lower_limit' => 39507,
                'upper_limit' => 79679,
                'fixed_fee' => 4184,
                'percent_over_lower_limit' => '21.36',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            39 => 
            array (
                'id' => 40,
                'payrolls_isr_config_id' => 1,
                'lower_limit' => 79680,
                'upper_limit' => 125585,
                'fixed_fee' => 12765,
                'percent_over_lower_limit' => '23.52',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            40 => 
            array (
                'id' => 41,
                'payrolls_isr_config_id' => 1,
                'lower_limit' => 125586,
                'upper_limit' => 239762,
                'fixed_fee' => 23562,
                'percent_over_lower_limit' => '30.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            41 => 
            array (
                'id' => 42,
                'payrolls_isr_config_id' => 1,
                'lower_limit' => 239763,
                'upper_limit' => 319682,
                'fixed_fee' => 57815,
                'percent_over_lower_limit' => '32.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            42 => 
            array (
                'id' => 43,
                'payrolls_isr_config_id' => 1,
                'lower_limit' => 319683,
                'upper_limit' => 959046,
                'fixed_fee' => 83389,
                'percent_over_lower_limit' => '34.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            43 => 
            array (
                'id' => 44,
                'payrolls_isr_config_id' => 1,
                'lower_limit' => 959047,
                'upper_limit' => 999999,
                'fixed_fee' => 300773,
                'percent_over_lower_limit' => '35.00',
                'created_at' => '2021-01-13 00:39:46',
                'updated_at' => '2021-01-13 00:39:46',
            ),
            44 => 
            array (
                'id' => 45,
                'payrolls_isr_config_id' => 5,
                'lower_limit' => 1,
                'upper_limit' => 2120,
                'fixed_fee' => 0,
                'percent_over_lower_limit' => '1.92',
                'created_at' => '2021-01-13 00:41:19',
                'updated_at' => '2021-01-13 00:41:19',
            ),
            45 => 
            array (
                'id' => 46,
                'payrolls_isr_config_id' => 5,
                'lower_limit' => 2121,
                'upper_limit' => 17996,
                'fixed_fee' => 41,
                'percent_over_lower_limit' => '6.40',
                'created_at' => '2021-01-13 00:41:19',
                'updated_at' => '2021-01-13 00:48:35',
            ),
            46 => 
            array (
                'id' => 47,
                'payrolls_isr_config_id' => 5,
                'lower_limit' => 17997,
                'upper_limit' => 31627,
                'fixed_fee' => 1057,
                'percent_over_lower_limit' => '10.88',
                'created_at' => '2021-01-13 00:48:35',
                'updated_at' => '2021-01-13 00:48:35',
            ),
            47 => 
            array (
                'id' => 48,
                'payrolls_isr_config_id' => 5,
                'lower_limit' => 31628,
                'upper_limit' => 36765,
                'fixed_fee' => 2540,
                'percent_over_lower_limit' => '16.00',
                'created_at' => '2021-01-13 00:48:35',
                'updated_at' => '2021-01-13 00:48:35',
            ),
            48 => 
            array (
                'id' => 49,
                'payrolls_isr_config_id' => 5,
                'lower_limit' => 36766,
                'upper_limit' => 44018,
                'fixed_fee' => 3362,
                'percent_over_lower_limit' => '17.92',
                'created_at' => '2021-01-13 00:48:35',
                'updated_at' => '2021-01-13 00:48:35',
            ),
            49 => 
            array (
                'id' => 50,
                'payrolls_isr_config_id' => 5,
                'lower_limit' => 44019,
                'upper_limit' => 88778,
                'fixed_fee' => 4662,
                'percent_over_lower_limit' => '21.36',
                'created_at' => '2021-01-13 00:48:35',
                'updated_at' => '2021-01-13 00:48:35',
            ),
            50 => 
            array (
                'id' => 51,
                'payrolls_isr_config_id' => 5,
                'lower_limit' => 88779,
                'upper_limit' => 139926,
                'fixed_fee' => 14222,
                'percent_over_lower_limit' => '23.52',
                'created_at' => '2021-01-13 00:48:35',
                'updated_at' => '2021-01-13 00:48:35',
            ),
            51 => 
            array (
                'id' => 52,
                'payrolls_isr_config_id' => 5,
                'lower_limit' => 139927,
                'upper_limit' => 267142,
                'fixed_fee' => 26252,
                'percent_over_lower_limit' => '30.00',
                'created_at' => '2021-01-13 00:48:35',
                'updated_at' => '2021-01-13 00:48:35',
            ),
            52 => 
            array (
                'id' => 53,
                'payrolls_isr_config_id' => 5,
                'lower_limit' => 267143,
                'upper_limit' => 356190,
                'fixed_fee' => 64417,
                'percent_over_lower_limit' => '32.00',
                'created_at' => '2021-01-13 00:48:35',
                'updated_at' => '2021-01-13 00:48:35',
            ),
            53 => 
            array (
                'id' => 54,
                'payrolls_isr_config_id' => 5,
                'lower_limit' => 356191,
                'upper_limit' => 1068569,
                'fixed_fee' => 92912,
                'percent_over_lower_limit' => '34.00',
                'created_at' => '2021-01-13 00:48:35',
                'updated_at' => '2021-01-13 00:48:35',
            ),
            54 => 
            array (
                'id' => 55,
                'payrolls_isr_config_id' => 5,
                'lower_limit' => 1068570,
                'upper_limit' => 9999999999,
                'fixed_fee' => 335121,
                'percent_over_lower_limit' => '35.00',
                'created_at' => '2021-01-13 00:48:35',
                'updated_at' => '2021-01-13 00:48:35',
            ),
            55 => 
            array (
                'id' => 139,
                'payrolls_isr_config_id' => 15,
                'lower_limit' => 125973,
                'upper_limit' => 221389,
                'fixed_fee' => 7399,
                'percent_over_lower_limit' => '10.88',
                'created_at' => '2021-01-13 01:22:58',
                'updated_at' => '2021-01-13 01:22:58',
            ),
            56 => 
            array (
                'id' => 148,
                'payrolls_isr_config_id' => 16,
                'lower_limit' => 1,
                'upper_limit' => 31800,
                'fixed_fee' => 0,
                'percent_over_lower_limit' => '1.92',
                'created_at' => '2021-01-13 01:29:21',
                'updated_at' => '2021-01-13 01:29:21',
            ),
            57 => 
            array (
                'id' => 149,
                'payrolls_isr_config_id' => 16,
                'lower_limit' => 31801,
                'upper_limit' => 269940,
                'fixed_fee' => 615,
                'percent_over_lower_limit' => '6.40',
                'created_at' => '2021-01-13 01:29:21',
                'updated_at' => '2021-01-13 01:29:21',
            ),
            58 => 
            array (
                'id' => 150,
                'payrolls_isr_config_id' => 16,
                'lower_limit' => 269941,
                'upper_limit' => 474405,
                'fixed_fee' => 15855,
                'percent_over_lower_limit' => '10.88',
                'created_at' => '2021-01-13 01:29:21',
                'updated_at' => '2021-01-13 01:29:21',
            ),
            59 => 
            array (
                'id' => 158,
                'payrolls_isr_config_id' => 16,
                'lower_limit' => 474406,
                'upper_limit' => 551475,
                'fixed_fee' => 34100,
                'percent_over_lower_limit' => '16.00',
                'created_at' => '2021-01-13 01:34:11',
                'updated_at' => '2021-01-13 01:34:11',
            ),
            60 => 
            array (
                'id' => 159,
                'payrolls_isr_config_id' => 16,
                'lower_limit' => 551476,
                'upper_limit' => 660270,
                'fixed_fee' => 50430,
                'percent_over_lower_limit' => '17.92',
                'created_at' => '2021-01-13 01:34:11',
                'updated_at' => '2021-01-13 01:34:11',
            ),
            61 => 
            array (
                'id' => 160,
                'payrolls_isr_config_id' => 16,
                'lower_limit' => 660271,
                'upper_limit' => 1331670,
                'fixed_fee' => 69930,
                'percent_over_lower_limit' => '21.36',
                'created_at' => '2021-01-13 01:34:11',
                'updated_at' => '2021-01-13 01:34:11',
            ),
            62 => 
            array (
                'id' => 161,
                'payrolls_isr_config_id' => 16,
                'lower_limit' => 1331671,
                'upper_limit' => 2098890,
                'fixed_fee' => 213330,
                'percent_over_lower_limit' => '23.52',
                'created_at' => '2021-01-13 01:34:11',
                'updated_at' => '2021-01-13 01:34:11',
            ),
            63 => 
            array (
                'id' => 162,
                'payrolls_isr_config_id' => 16,
                'lower_limit' => 2098891,
                'upper_limit' => 4007130,
                'fixed_fee' => 393780,
                'percent_over_lower_limit' => '30.00',
                'created_at' => '2021-01-13 01:34:11',
                'updated_at' => '2021-01-13 01:34:11',
            ),
            64 => 
            array (
                'id' => 163,
                'payrolls_isr_config_id' => 16,
                'lower_limit' => 4007131,
                'upper_limit' => 5342850,
                'fixed_fee' => 966255,
                'percent_over_lower_limit' => '32.00',
                'created_at' => '2021-01-13 01:34:11',
                'updated_at' => '2021-01-13 01:34:11',
            ),
            65 => 
            array (
                'id' => 164,
                'payrolls_isr_config_id' => 16,
                'lower_limit' => 5342851,
                'upper_limit' => 16028535,
                'fixed_fee' => 1393680,
                'percent_over_lower_limit' => '34.00',
                'created_at' => '2021-01-13 01:34:11',
                'updated_at' => '2021-01-13 01:34:11',
            ),
            66 => 
            array (
                'id' => 165,
                'payrolls_isr_config_id' => 16,
                'lower_limit' => 16028536,
                'upper_limit' => 99999999999999,
                'fixed_fee' => 5026815,
                'percent_over_lower_limit' => '35.00',
                'created_at' => '2021-01-13 01:34:11',
                'updated_at' => '2021-01-13 01:34:11',
            ),
            67 => 
            array (
                'id' => 137,
                'payrolls_isr_config_id' => 15,
                'lower_limit' => 1,
                'upper_limit' => 14840,
                'fixed_fee' => 0,
                'percent_over_lower_limit' => '1.92',
                'created_at' => '2021-01-13 01:21:29',
                'updated_at' => '2021-01-13 01:21:29',
            ),
            68 => 
            array (
                'id' => 138,
                'payrolls_isr_config_id' => 15,
                'lower_limit' => 14841,
                'upper_limit' => 125972,
                'fixed_fee' => 287,
                'percent_over_lower_limit' => '6.40',
                'created_at' => '2021-01-13 01:21:29',
                'updated_at' => '2021-01-13 01:21:29',
            ),
            69 => 
            array (
                'id' => 140,
                'payrolls_isr_config_id' => 15,
                'lower_limit' => 221390,
                'upper_limit' => 257355,
                'fixed_fee' => 17780,
                'percent_over_lower_limit' => '16.00',
                'created_at' => '2021-01-13 01:26:23',
                'updated_at' => '2021-01-13 01:26:23',
            ),
            70 => 
            array (
                'id' => 141,
                'payrolls_isr_config_id' => 15,
                'lower_limit' => 257356,
                'upper_limit' => 308126,
                'fixed_fee' => 23534,
                'percent_over_lower_limit' => '17.92',
                'created_at' => '2021-01-13 01:26:23',
                'updated_at' => '2021-01-13 01:26:23',
            ),
            71 => 
            array (
                'id' => 142,
                'payrolls_isr_config_id' => 15,
                'lower_limit' => 308127,
                'upper_limit' => 621446,
                'fixed_fee' => 32634,
                'percent_over_lower_limit' => '21.36',
                'created_at' => '2021-01-13 01:26:23',
                'updated_at' => '2021-01-13 01:26:23',
            ),
            72 => 
            array (
                'id' => 143,
                'payrolls_isr_config_id' => 15,
                'lower_limit' => 621447,
                'upper_limit' => 979482,
                'fixed_fee' => 99554,
                'percent_over_lower_limit' => '23.52',
                'created_at' => '2021-01-13 01:26:23',
                'updated_at' => '2021-01-13 01:26:23',
            ),
            73 => 
            array (
                'id' => 144,
                'payrolls_isr_config_id' => 15,
                'lower_limit' => 979483,
                'upper_limit' => 1869994,
                'fixed_fee' => 183764,
                'percent_over_lower_limit' => '30.00',
                'created_at' => '2021-01-13 01:26:23',
                'updated_at' => '2021-01-13 01:26:23',
            ),
            74 => 
            array (
                'id' => 145,
                'payrolls_isr_config_id' => 15,
                'lower_limit' => 1869995,
                'upper_limit' => 2493330,
                'fixed_fee' => 450919,
                'percent_over_lower_limit' => '32.00',
                'created_at' => '2021-01-13 01:26:23',
                'updated_at' => '2021-01-13 01:26:23',
            ),
            75 => 
            array (
                'id' => 146,
                'payrolls_isr_config_id' => 15,
                'lower_limit' => 2493331,
                'upper_limit' => 7479983,
                'fixed_fee' => 650384,
                'percent_over_lower_limit' => '34.00',
                'created_at' => '2021-01-13 01:26:23',
                'updated_at' => '2021-01-13 01:26:23',
            ),
            76 => 
            array (
                'id' => 147,
                'payrolls_isr_config_id' => 15,
                'lower_limit' => 7479984,
                'upper_limit' => 999999999999,
                'fixed_fee' => 2345847,
                'percent_over_lower_limit' => '35.00',
                'created_at' => '2021-01-13 01:26:23',
                'updated_at' => '2021-01-13 01:26:23',
            ),
            77 => 
            array (
                'id' => 166,
                'payrolls_isr_config_id' => 17,
                'lower_limit' => 1,
                'upper_limit' => 64458,
                'fixed_fee' => 0,
                'percent_over_lower_limit' => '1.92',
                'created_at' => '2021-01-13 01:41:50',
                'updated_at' => '2021-01-13 01:41:50',
            ),
            78 => 
            array (
                'id' => 167,
                'payrolls_isr_config_id' => 17,
                'lower_limit' => 64459,
                'upper_limit' => 547092,
                'fixed_fee' => 1238,
                'percent_over_lower_limit' => '6.40',
                'created_at' => '2021-01-13 01:41:50',
                'updated_at' => '2021-01-13 01:41:50',
            ),
            79 => 
            array (
                'id' => 168,
                'payrolls_isr_config_id' => 17,
                'lower_limit' => 547093,
                'upper_limit' => 961466,
                'fixed_fee' => 32126,
                'percent_over_lower_limit' => '10.88',
                'created_at' => '2021-01-13 01:41:50',
                'updated_at' => '2021-01-13 01:41:50',
            ),
            80 => 
            array (
                'id' => 169,
                'payrolls_isr_config_id' => 17,
                'lower_limit' => 961467,
                'upper_limit' => 1117662,
                'fixed_fee' => 77210,
                'percent_over_lower_limit' => '16.00',
                'created_at' => '2021-01-13 01:41:50',
                'updated_at' => '2021-01-13 01:41:50',
            ),
            81 => 
            array (
                'id' => 170,
                'payrolls_isr_config_id' => 17,
                'lower_limit' => 1117663,
                'upper_limit' => 1338147,
                'fixed_fee' => 102201,
                'percent_over_lower_limit' => '17.92',
                'created_at' => '2021-01-13 01:41:50',
                'updated_at' => '2021-01-13 01:41:50',
            ),
            82 => 
            array (
                'id' => 171,
                'payrolls_isr_config_id' => 17,
                'lower_limit' => 1338148,
                'upper_limit' => 2698850,
                'fixed_fee' => 141712,
                'percent_over_lower_limit' => '21.36',
                'created_at' => '2021-01-13 01:41:50',
                'updated_at' => '2021-01-13 01:41:50',
            ),
            83 => 
            array (
                'id' => 172,
                'payrolls_isr_config_id' => 17,
                'lower_limit' => 2698851,
                'upper_limit' => 4253758,
                'fixed_fee' => 432358,
                'percent_over_lower_limit' => '23.52',
                'created_at' => '2021-01-13 01:41:50',
                'updated_at' => '2021-01-13 01:41:50',
            ),
            84 => 
            array (
                'id' => 173,
                'payrolls_isr_config_id' => 17,
                'lower_limit' => 4253759,
                'upper_limit' => 8121125,
                'fixed_fee' => 798073,
                'percent_over_lower_limit' => '30.00',
                'created_at' => '2021-01-13 01:41:50',
                'updated_at' => '2021-01-13 01:41:50',
            ),
            85 => 
            array (
                'id' => 174,
                'payrolls_isr_config_id' => 17,
                'lower_limit' => 8121126,
                'upper_limit' => 10828167,
                'fixed_fee' => 1958283,
                'percent_over_lower_limit' => '32.00',
                'created_at' => '2021-01-13 01:41:50',
                'updated_at' => '2021-01-13 01:41:50',
            ),
            86 => 
            array (
                'id' => 175,
                'payrolls_isr_config_id' => 17,
                'lower_limit' => 10828168,
                'upper_limit' => 32484501,
                'fixed_fee' => 2824536,
                'percent_over_lower_limit' => '34.00',
                'created_at' => '2021-01-13 01:41:50',
                'updated_at' => '2021-01-13 01:41:50',
            ),
            87 => 
            array (
                'id' => 176,
                'payrolls_isr_config_id' => 17,
                'lower_limit' => 32484502,
                'upper_limit' => 99999999999,
                'fixed_fee' => 10187690,
                'percent_over_lower_limit' => '35.00',
                'created_at' => '2021-01-13 01:41:50',
                'updated_at' => '2021-01-13 01:41:50',
            ),
        ));
        
        \DB::statement('ALTER SEQUENCE isr_withholdings_id_seq RESTART WITH 177');
        
    }
}