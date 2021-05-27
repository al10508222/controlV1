<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatEmploymentType;

class CatEmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatEmploymentType::create([
            'id'                =>  1,
            'name'              =>  'Nuevo ingreso/Alta',
        ]);
        CatEmploymentType::create([
            'id'                => 2,
            'name'              => 'Renovación',
        ]);
        CatEmploymentType::create([
            'id'                => 3,
            'name'              => 'Cambio de nivel',
        ]);
        CatEmploymentType::create([
            'id'                => 4,
            'name'              => 'Cambio de adscripción',
        ]);
        CatEmploymentType::create([
            'id'                => 5,
            'name'              => 'Baja',
        ]);
        CatEmploymentType::create([
            'id'                => 6,
            'name'              => 'Recontratación',
        ]);
    }
}
