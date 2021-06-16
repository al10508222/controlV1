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
                        'entidad_nombre'   => $item->entidad_nombre,
                        'entidad_nombre_corto'   => $item->entidad_nombre_corto,
                        'municipio_id'   => $item->municipio_id,
                        'municipio_nombre'   => $item->municipio_nombre,
                        'localidad_id'   => $item->localidad_id,
                        'localidad_nombre'   => $item->localidad_nombre,
                        'ambito'   => $item->ambito
                    ]
                ]
            );
        }
        
        \DB::statement('ALTER SEQUENCE public.localidades_id_seq RESTART WITH 300685');
    }
}
