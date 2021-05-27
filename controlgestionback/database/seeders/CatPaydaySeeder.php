<?php

namespace Database\Seeders;

use App\Models\CatPayDay;
use Illuminate\Database\Seeder;

class CatPaydaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatPayDay::create([
            'day'       => 'Hoy',
            'initials'  => 'H'
        ]);
        CatPayDay::create([
            'day'     => 'Mañana',
            'initials' => 'M'
        ]);
    }
}
