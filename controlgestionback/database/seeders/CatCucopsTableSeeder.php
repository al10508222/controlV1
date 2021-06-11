<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class CatCucopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('catalogo_cucop')->delete();
        $json = File::get(__DIR__ . '/json/catalogo_cucop.json');

        $data = json_decode($json);
            
        foreach ($data as $item){
             \DB::table('catalogo_cucop')->insert(
                [
                    [
                        'id'   => $item->id,
                        'tipo'   => $item->tipo,
                        'clave_cucop'   => $item->clave_cucop,
                        'partida_especifica'   => $item->partida_especifica,
                        'clave_cucop2'   => $item->clave_cucop2,
                        'descripcion'   => $item->descripcion,
                        'nivel'   => $item->nivel,
                        'cabm'   => $item->cabm,
                        'unidad_medida'   => $item->unidad_medida,
                        'tipo_contratacion'   => $item->tipo_contratacion
                    ]
                ]
            );
        }
        
        \DB::statement('ALTER SEQUENCE public.catalogo_cucop_id_seq RESTART WITH 12299');
    }
}
