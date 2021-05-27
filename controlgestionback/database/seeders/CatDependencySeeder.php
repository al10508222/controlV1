<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatDependency;

class CatDependencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatDependency::create([
            'id'            => 1,
            'name'          => 'INFOTEC',
            'fiscalName'    => 'INFOTEC Centro de Investigación e Innovación en Tecnologías de la Información y Comunicación',
            'rfc'           => 'FID741230A22',
        ]);
    }
}
