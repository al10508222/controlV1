<?php

namespace Database\Seeders;
namespace Database\Seeders;

use App\Models\FiveYearBonus;
use Illuminate\Database\Seeder;

class FiveYearBonusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FiveYearBonus::create([
            'id' => 1,
            'name' => 'Primas Quinquenales',
            'year' => '2020',
            'description' => 'Tabla de primas quinquenales'
        ]);

        \DB::statement('ALTER SEQUENCE five_year_bonuses_id_seq RESTART WITH 2');
    }
}
