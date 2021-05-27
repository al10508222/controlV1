<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatEducationalLevel;

class CatEducationalLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatEducationalLevel::create([
            'id'                => 1,
            'name'              => 'Primaria',
        ]);
        CatEducationalLevel::create([
            'id'                => 2,
            'name'              => 'Secundaria',
        ]);
        CatEducationalLevel::create([
            'id'                => 3,
            'name'              => 'Preparatoria',
        ]);
        CatEducationalLevel::create([
            'id'                => 4,
            'name'              => 'Licenciatura',
        ]);
        CatEducationalLevel::create([
            'id'                => 5,
            'name'              => 'Maestria',
        ]);
        CatEducationalLevel::create([
            'id'                => 6,
            'name'              => 'Doctorado',
        ]);
    }
}
