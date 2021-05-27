<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatConceptType;

class CatConceptTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatConceptType::create([
            'id' => 1,
            'name' => 'Percepción',
        ]);
        CatConceptType::create([
            'id' => 2,
            'name' => 'Deducción',
        ]);
        CatConceptType::create([
            'id' => 3,
            'name' => 'Provisión',
        ]);
    }
}
