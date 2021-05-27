<?php

namespace Database\Seeders;

use App\Models\CatTimeZone;
use Illuminate\Database\Seeder;

class CatTimeZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatTimeZone::create([
            'id' => 1,
            'name' => 'Noroeste (UTC-8)',
        ]);
        CatTimeZone::create([
            'id' => 2,
            'name' => 'Pacífico (UTC-7)',
        ]);
        CatTimeZone::create([
            'id' => 3,
            'name' => 'Centro (UTC-6)',
        ]);
        CatTimeZone::create([
            'id' => 4,
            'name' => 'Sureste (UTC-5)',
        ]);
    }
}
