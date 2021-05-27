<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::create([
            'id' => 1,
            'name' =>'Nómina',
            'description' => 'Horario perteneciente al área de nómina.',
            'cat_time_zone_id' => 3,
            'has_rest_time' => false
        ]);
        \DB::statement('ALTER SEQUENCE schedules_id_seq RESTART WITH 2');
    }
}
