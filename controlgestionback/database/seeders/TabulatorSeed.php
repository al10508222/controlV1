<?php

namespace Database\Seeders;

use App\Models\Catalogs\CatTabulator;
use Illuminate\Database\Seeder;

class TabulatorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatTabulator::create([
            'id'                   => 1,
            'name'                 => 'K22',
            'base_salary_cents'    => 1941600,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 11732900,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 2,
            'name'                 => 'M43',
            'base_salary_cents'    => 1494600,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 9397000,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 3,
            'name'                 => 'M42',
            'base_salary_cents'    => 1494600,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 8383100,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 4,
            'name'                 => 'M41',
            'base_salary_cents'    => 1494600,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 7369200,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 5,
            'name'                 => 'M33',
            'base_salary_cents'    => 1458200,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 6645200,
            'cat_contract_type_id' => 1
        ]);
        CatTabulator::create([
            'id'                   => 6,
            'name'                 => 'M32',
            'base_salary_cents'    => 1458200,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 6345200,
            'cat_contract_type_id' => 1
        ]);
        CatTabulator::create([
            'id'                   => 7,
            'name'                 => 'M31',
            'base_salary_cents'    => 1458200,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 6138700,
            'cat_contract_type_id' => 1
        ]);
        CatTabulator::create([
            'id'                   => 8,
            'name'                 => 'M23',
            'base_salary_cents'    => 1272300,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 5944800,
            'cat_contract_type_id' => 1
        ]);
        CatTabulator::create([
            'id'                   => 9,
            'name'                 => 'M22',
            'base_salary_cents'    => 1272300,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 5565000,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 10,
            'name'                 => 'M21',
            'base_salary_cents'    => 1272300,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 4931900,
            'cat_contract_type_id' => 1
        ]);
        CatTabulator::create([
            'id'                   => 11,
            'name'                 => 'M13',
            'base_salary_cents'    => 942400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 5008500,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 12,
            'name'                 => 'M12',
            'base_salary_cents'    => 942400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 4755300,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 13,
            'name'                 => 'M11',
            'base_salary_cents'    => 942400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 4628700,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 14,
            'name'                 => 'N33',
            'base_salary_cents'    => 920400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 4524100,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 15,
            'name'                 => 'N32',
            'base_salary_cents'    => 920400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 3992300,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 16,
            'name'                 => 'N31',
            'base_salary_cents'    => 920400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 3587100,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 17,
            'name'                 => 'N23',
            'base_salary_cents'    => 898400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 3280000,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 18,
            'name'                 => 'N22',
            'base_salary_cents'    => 898400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 2950800,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 19,
            'name'                 => 'N21',
            'base_salary_cents'    => 898400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 2874800,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 20,
            'name'                 => 'N13',
            'base_salary_cents'    => 876300,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 2643600,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 21,
            'name'                 => 'N12',
            'base_salary_cents'    => 876300,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 2517000,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 22,
            'name'                 => 'N11',
            'base_salary_cents'    => 876300,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 2390400,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 23,
            'name'                 => 'O33',
            'base_salary_cents'    => 843200,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 2372900,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 24,
            'name'                 => 'O32',
            'base_salary_cents'    => 843200,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 2130000,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 25,
            'name'                 => 'O31',
            'base_salary_cents'    => 843200,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 1960100,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 26,
            'name'                 => 'O23',
            'base_salary_cents'    => 813400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 1768600,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 27,
            'name'                 => 'O22',
            'base_salary_cents'    => 813400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 1670600,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 28,
            'name'                 => 'O21',
            'base_salary_cents'    => 813400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 1481400,
            'cat_contract_type_id' => 1
        ]);


        CatTabulator::create([
            'id'                   => 29,
            'name'                 => 'O13',
            'base_salary_cents'    => 755000,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 1501500,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 30,
            'name'                 => 'O12',
            'base_salary_cents'    => 755000,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 1430400,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 31,
            'name'                 => 'O11',
            'base_salary_cents'    => 755000,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 1374900,
            'cat_contract_type_id' => 1
        ]);
        CatTabulator::create([
            'id'                   => 32,
            'name'                 => 'P33',
            'base_salary_cents'    => 727400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 1305800,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 33,
            'name'                 => 'P32',
            'base_salary_cents'    => 727400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 1166100,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 34,
            'name'                 => 'P31',
            'base_salary_cents'    => 727400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 1093000,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 35,
            'name'                 => 'P23',
            'base_salary_cents'    => 700800,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 1000200,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 36,
            'name'                 => 'P22',
            'base_salary_cents'    => 700800,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 858400,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 37,
            'name'                 => 'P21',
            'base_salary_cents'    => 700800,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 716200,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 38,
            'name'                 => 'P13',
            'base_salary_cents'    => 650500,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 624100,
            'cat_contract_type_id' => 1
        ]);

        CatTabulator::create([
            'id'                   => 39,
            'name'                 => 'P12',
            'base_salary_cents'    => 650500,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 437000,
            'cat_contract_type_id' => 1
        ]);
        CatTabulator::create([
            'id'                   => 40,
            'name'                 => 'P11',
            'base_salary_cents'    => 650500,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 409800,
            'cat_contract_type_id' => 1
        ]);


        /*** Eventual */

        CatTabulator::create([
            'id'                   => 41,
            'name'                 => 'K22',
            'base_salary_cents'    => 13674500,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 42,
            'name'                 => 'M43',
            'base_salary_cents'    => 10891600,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 43,
            'name'                 => 'M42',
            'base_salary_cents'    => 9877700,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 44,
            'name'                 => 'M41',
            'base_salary_cents'    => 8863800,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 45,
            'name'                 => 'M33',
            'base_salary_cents'    => 8103400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 46,
            'name'                 => 'M32',
            'base_salary_cents'    => 7850200,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 47,
            'name'                 => 'M31',
            'base_salary_cents'    => 7596900,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 48,
            'name'                 => 'M23',
            'base_salary_cents'    => 7217100,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 49,
            'name'                 => 'M22',
            'base_salary_cents'    => 6837300,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 50,
            'name'                 => 'M21',
            'base_salary_cents'    => 6204200,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 51,
            'name'                 => 'M13',
            'base_salary_cents'    => 5950900,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 52,
            'name'                 => 'M12',
            'base_salary_cents'    => 5697700,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 53,
            'name'                 => 'M11',
            'base_salary_cents'    => 5571100,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 54,
            'name'                 => 'N33',
            'base_salary_cents'    => 5444500,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 55,
            'name'                 => 'N32',
            'base_salary_cents'    => 4912700,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 56,
            'name'                 => 'N31',
            'base_salary_cents'    => 4507500,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 57,
            'name'                 => 'N23',
            'base_salary_cents'    => 4178400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 58,
            'name'                 => 'N22',
            'base_salary_cents'    => 3849200,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 59,
            'name'                 => 'N21',
            'base_salary_cents'    => 3773200,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 60,
            'name'                 => 'N13',
            'base_salary_cents'    => 351990,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 61,
            'name'                 => 'N12',
            'base_salary_cents'    => 3393300,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 62,
            'name'                 => 'N11',
            'base_salary_cents'    => 3266700,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 63,
            'name'                 => 'O33',
            'base_salary_cents'    => 3216100,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 64,
            'name'                 => 'O32',
            'base_salary_cents'    => 2973200,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 65,
            'name'                 => 'O32',
            'base_salary_cents'    => 2803300,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 66,
            'name'                 => 'O23',
            'base_salary_cents'    => 2582000,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 67,
            'name'                 => 'O22',
            'base_salary_cents'    => 2484000,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);
        CatTabulator::create([
            'id'                   => 68,
            'name'                 => 'O21',
            'base_salary_cents'    => 2294800,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 69,
            'name'                 => 'O13',
            'base_salary_cents'    => 2256500,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 70,
            'name'                 => 'O12',
            'base_salary_cents'    => 2184500,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 71,
            'name'                 => 'O11',
            'base_salary_cents'    => 2129900,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 72,
            'name'                 => 'P33',
            'base_salary_cents'    => 2033200,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 73,
            'name'                 => 'P32',
            'base_salary_cents'    => 1893500,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 74,
            'name'                 => 'P31',
            'base_salary_cents'    => 1820400,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 75,
            'name'                 => 'P23',
            'base_salary_cents'    => 1701000,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 76,
            'name'                 => 'P22',
            'base_salary_cents'    => 1559200,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 77,
            'name'                 => 'P21',
            'base_salary_cents'    => 1417000,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 78,
            'name'                 => 'P13',
            'base_salary_cents'    => 1274600,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 79,
            'name'                 => 'P12',
            'base_salary_cents'    => 1087500,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        CatTabulator::create([
            'id'                   => 80,
            'name'                 => 'P11',
            'base_salary_cents'    => 1060300,
            'daily_salary_cents'   => 0,
            'compensation_cents'   => 0,
            'cat_contract_type_id' => 2
        ]);

        
        \DB::statement('ALTER SEQUENCE public.cat_tabulators_id_seq RESTART WITH 81');



        
    }
}
