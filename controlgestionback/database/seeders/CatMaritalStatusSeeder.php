<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatMaritalStatus;

class CatMaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatMaritalStatus::create([
            'id'                => 1,
            'name'              => 'Soltero(a)',
        ]);
        CatMaritalStatus::create([
            'id'                => 2,
            'name'              => 'Casado(a)',
        ]);
        CatMaritalStatus::create([
            'id'                => 3,
            'name'              => 'Divorciado(a)',
        ]);
        CatMaritalStatus::create([
            'id'                => 4,
            'name'              => 'Separación en proceso judicial',
        ]);
        CatMaritalStatus::create([
            'id'                => 5,
            'name'              => 'Viudo(a)',
        ]);
        CatMaritalStatus::create([
            'id'                => 6,
            'name'              => 'Concubinato',
        ]);
    }
}
