<?php

namespace Database\Seeders;

use App\Models\CatDay;
use Illuminate\Database\Seeder;

class CatDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatDay::create([
            'id' => 1,
            'name' => 'Lunes'
        ]);
        CatDay::create([
            'id' => 2,
            'name' => 'Martes'
        ]);
        CatDay::create([
            'id' => 3,
            'name' => 'Miércoles'
        ]);
        CatDay::create([
            'id' => 4,
            'name' => 'Jueves'
        ]);
        CatDay::create([
            'id' => 5,
            'name' => 'Viernes'
        ]);
        CatDay::create([
            'id' => 6,
            'name' => 'Sábado'
        ]);
        CatDay::create([
            'id' => 7,
            'name' => 'Domingo'
        ]);
    }
}
