<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TipoVialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tipo_vialidad')->insert(
            [
                [
                    'id'                => 1,
                    'vialidad_nombre'   =>'NO ESPECIFICADO'
                ],
                [
                    'id'                => 2,
                    'vialidad_nombre'   =>'AVENIDA'
                ],
                [
                    'id'                => 3,
                    'vialidad_nombre'   =>''
                ],
                [
                    'id'                => 4,
                    'vialidad_nombre'   =>'PROLONGACION'
                ],
                [
                    'id'                => 5,
                    'vialidad_nombre'   =>'ANDADOR'
                ],
                [
                    'id'                => 6,
                    'vialidad_nombre'   =>'NINGUNO'
                ],
                [
                    'id'                => 7,
                    'vialidad_nombre'   =>'PASAJE'
                ],
                [
                    'id'                => 8,
                    'vialidad_nombre'   =>'SIN INFORMACION'
                ],
                [
                    'id'                => 9,
                    'vialidad_nombre'   =>'CIRCUNVALACION'
                ],
                [
                    'id'                => 10,
                    'vialidad_nombre'   =>'CIRCUNVALACION'
                ],
                [
                    'id'                => 11,
                    'vialidad_nombre'   =>'CORREDOR'
                ],
                [
                    'id'                => 12,
                    'vialidad_nombre'   =>'VIADUCTO'
                ],
                [
                    'id'                => 13,
                    'vialidad_nombre'   =>'BOULEVARD'
                ],
                [
                    'id'                => 14,
                    'vialidad_nombre'   =>'CIRCUITO'
                ],
                [
                    'id'                => 15,
                    'vialidad_nombre'   =>'CERRADA'
                ],
                [
                    'id'                => 16,
                    'vialidad_nombre'   =>'PASEO'
                ],
                [
                    'id'                => 17,
                    'vialidad_nombre'   =>'CONTINUACION'
                ],
                [
                    'id'                => 18,
                    'vialidad_nombre'   =>'EJE VIAL'
                ],
                [
                    'id'                => 19,
                    'vialidad_nombre'   =>'CALLEJON'
                ],
                [
                    'id'                => 20,
                    'vialidad_nombre'   =>'CALZADA'
                ],
                [
                    'id'                => 21,
                    'vialidad_nombre'   =>'LIBRAMIENTO'
                ],
                [
                    'id'                => 22,
                    'vialidad_nombre'   =>'PERIFERICO'
                ],
                [
                    'id'                => 23,
                    'vialidad_nombre'   =>'NO APLICA'
                ],
                [
                    'id'                => 24,
                    'vialidad_nombre'   =>'CALLE'
                ],
                [
                    'id'                => 25,
                    'vialidad_nombre'   =>'CARRETERA'
                ],
                [
                    'id'                => 26,
                    'vialidad_nombre'   =>'PRIVADA'
                ],
                [
                    'id'                => 27,
                    'vialidad_nombre'   =>'RETORNO'
                ],
                [
                    'id'                => 28,
                    'vialidad_nombre'   =>'CAMINO'
                ],
                [
                    'id'                => 29,
                    'vialidad_nombre'   =>'DIAGONAL'
                ],
                [
                    'id'                => 30,
                    'vialidad_nombre'   =>'PEATONAL'
                ],

           ]
        );
        \DB::statement('ALTER SEQUENCE public.tipo_vialidad_id_seq RESTART WITH 1');
    }
}
