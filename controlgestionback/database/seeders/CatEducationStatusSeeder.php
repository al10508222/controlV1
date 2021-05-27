<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatEducationStatus;

class CatEducationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatEducationStatus::create([
            'id'                => 1,
            'name'              => 'Trunco',
        ]);
        CatEducationStatus::create([
            'id'                => 2,
            'name'              => 'Títulado',
        ]);
        CatEducationStatus::create([
            'id'                => 3,
            'name'              => 'Pasante',
        ]);
    }
}
