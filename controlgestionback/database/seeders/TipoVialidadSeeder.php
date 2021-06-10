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
                    'vialidad_nombre'   =>'PROLONGACION'
                ],
                [
                    'id'                => 4,
                    'vialidad_nombre'   =>'ANDADOR'
                ],
                [
                    'id'                => 5,
                    'vialidad_nombre'   =>'NINGUNO'
                ],
                [
                    'id'                => 6,
                    'vialidad_nombre'   =>'PASAJE'
                ],
                [
                    'id'                => 7,
                    'vialidad_nombre'   =>'SIN INFORMACION'
                ],
                [
                    'id'                => 8,
                    'vialidad_nombre'   =>'CIRCUNVALACION'
                ],
                [
                    'id'                => 9,
                    'vialidad_nombre'   =>'CIRCUNVALACION'
                ],
                [
                    'id'                => 10,
                    'vialidad_nombre'   =>'CORREDOR'
                ],
                [
                    'id'                => 11,
                    'vialidad_nombre'   =>'VIADUCTO'
                ],
                [
                    'id'                => 12,
                    'vialidad_nombre'   =>'BOULEVARD'
                ],
                [
                    'id'                => 13,
                    'vialidad_nombre'   =>'CIRCUITO'
                ],
                [
                    'id'                => 14,
                    'vialidad_nombre'   =>'CERRADA'
                ],
                [
                    'id'                => 15,
                    'vialidad_nombre'   =>'PASEO'
                ],
                [
                    'id'                => 16,
                    'vialidad_nombre'   =>'CONTINUACION'
                ],
                [
                    'id'                => 17,
                    'vialidad_nombre'   =>'EJE VIAL'
                ],
                [
                    'id'                => 18,
                    'vialidad_nombre'   =>'CALLEJON'
                ],
                [
                    'id'                => 19,
                    'vialidad_nombre'   =>'CALZADA'
                ],
                [
                    'id'                => 20,
                    'vialidad_nombre'   =>'LIBRAMIENTO'
                ],
                [
                    'id'                => 21,
                    'vialidad_nombre'   =>'PERIFERICO'
                ],
                [
                    'id'                => 22,
                    'vialidad_nombre'   =>'NO APLICA'
                ],
                [
                    'id'                => 23,
                    'vialidad_nombre'   =>'CALLE'
                ],
                [
                    'id'                => 24,
                    'vialidad_nombre'   =>'CARRETERA'
                ],
                [
                    'id'                => 25,
                    'vialidad_nombre'   =>'PRIVADA'
                ],
                [
                    'id'                => 26,
                    'vialidad_nombre'   =>'RETORNO'
                ],
                [
                    'id'                => 27,
                    'vialidad_nombre'   =>'CAMINO'
                ],
                [
                    'id'                => 28,
                    'vialidad_nombre'   =>'DIAGONAL'
                ],
                [
                    'id'                => 29,
                    'vialidad_nombre'   =>'PEATONAL'
                ],

           ]
        );
        \DB::statement('ALTER SEQUENCE public.tipo_vialidad_id_seq RESTART WITH 30');
    }
}
