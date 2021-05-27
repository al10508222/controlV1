<?php

namespace Database\Seeders;

use App\Models\LawVacations;
use Illuminate\Database\Seeder;

class LawVacationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LawVacations::create([
            'id' => 1,
            'name' => 'Vacaciones de Ley 2020',
            'year' => '2020',
            'description' => 'Tabla de vacaciones de Ley vigente'
        ]);
        
        \DB::statement('ALTER SEQUENCE law_vacations_id_seq RESTART WITH 2');
    }
}
