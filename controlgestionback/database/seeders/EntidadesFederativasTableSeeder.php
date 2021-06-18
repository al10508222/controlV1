<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class EntidadesFederativasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('entidades')->delete();
        $json = File::get(__DIR__ . '/json/entidades.json');

        $data = json_decode($json);
            
        foreach ($data as $item){
             \DB::table('entidades')->insert(
                [
                    [
                        'ENTIDADFEDERATIVAID'           => $item->id,
                        'ENTIDADFEDERATIVANOMBRE'       => $item->entidad_nombre,
                        'ENTIDADFEDERATIVAABREVIACION'  => $item->entidad_nombre_corto
                    ]
                ]
            );
        }
    }
}
