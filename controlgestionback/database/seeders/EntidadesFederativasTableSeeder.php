<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EntidadesFederativasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('DELETE FROM public.entidades');
        \DB::table('entidades')->insert(
            [
                [
                    'id'                => 1,
                    'entidad_nombre'   =>'SIN ESPECIFICAR',
                    'entidad_nombre_corto'   => 'SE'
                ],
                [
                    'id'                => 2,
                    'entidad_nombre'   =>'AGUASCALIENTES',
                    'entidad_nombre_corto'   => 'AG'
                ]

           ]
        );
        \DB::statement('ALTER SEQUENCE public.entidades_id_seq RESTART WITH 36');
    }
}
