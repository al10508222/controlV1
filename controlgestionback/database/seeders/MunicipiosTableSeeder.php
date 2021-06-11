<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class MunicipiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('municipios')->delete();
        $json = File::get(__DIR__ . '/json/municipios.json');

        $data = json_decode($json);
            
        foreach ($data as $item){
             \DB::table('municipios')->insert(
                [
                    [
                        'id'           => $item->id,
                        'entidad_id'   => $item->entidad_id,
                        'consecutivo'   => $item->consecutivo,
                        'municipio_nombre'   => $item->municipio_nombre
                    ]
                ]
            );
        }
        
        \DB::statement('ALTER SEQUENCE public.municipios_id_seq RESTART WITH 2491');
    }
}
