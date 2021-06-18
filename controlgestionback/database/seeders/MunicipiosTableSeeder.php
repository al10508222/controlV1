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
                        'MUNICIPIOID'           => $item->id,
                        'ENTIDADFEDERATIVAID'   => $item->entidad_id,
                        'MUNICIPIONOMBRE'   => $item->municipio_nombre
                    ]
                ]
            );
        }
    }
}
