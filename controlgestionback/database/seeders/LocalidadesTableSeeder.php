<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class LocalidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('localidades')->delete();
        $json = File::get(__DIR__ . '/json/localidades.json');

        $data = json_decode($json);
            
        foreach ($data as $item){
             \DB::table('localidades')->insert(
                [
                    [
                        'entidad_id'   => $item->entidad_id,
                        'municipio_id'   => $item->municipio_id,
                        'consecutivo'   => $item->consecutivo,
                        'localidad_nombre'   => $item->localidad_nombre,
                        'cp'   => $item->cp,
                    ]
                ]
            );
        }
        
        \DB::statement('ALTER SEQUENCE public.localidades_id_seq RESTART WITH 13374');
    }
}
