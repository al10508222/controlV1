<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatTypeData;

class CatTypeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dato = new CatTypeData();
        $dato->name = 'Texto';
        $dato->save();

        $dato = new CatTypeData();
        $dato->name = 'Lista';
        $dato->save();

        $dato = new CatTypeData();
        $dato->name = 'Radio';
        $dato->save();

        $dato = new CatTypeData();
        $dato->name = 'Checkbox';
        $dato->save();

        $dato = new CatTypeData();
        $dato->name = 'Área de texto';
        $dato->save();

        $dato = new CatTypeData();
        $dato->name = 'Fecha';
        $dato->save();

        $dato = new CatTypeData();
        $dato->name = 'Número';
        $dato->save();
    }
}
