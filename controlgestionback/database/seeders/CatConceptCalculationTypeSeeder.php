<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatConceptCalculationType;

class CatConceptCalculationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatConceptCalculationType::create([
            'id'                => 1,
            'name'              => 'Fijo',
        ]);
        CatConceptCalculationType::create([
            'id'                => 2,
            'name'              => 'Variable',
        ]);
    }
}
