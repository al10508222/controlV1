<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatGender;

class CatGenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatGender::create([
            'id'                =>  1,
            'name'              =>  'Masculino',
        ]);
        CatGender::create([
            'id'                => 2,
            'name'              => 'Femenino',
        ]);
    }
}
