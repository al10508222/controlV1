<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class TipoAsentamientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tipo_asentamientos')->delete();
        \DB::table('tipo_asentamientos')->insert(
           [
                [
                    'TIPOASENTAMIENTOID'       => 1,
                    'TIPOASENTAMIENTONOMBRE'  => 'NINGUNO'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 2,
                    'TIPOASENTAMIENTONOMBRE'  => 'ZONA FEDERAL'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 3,
                    'TIPOASENTAMIENTONOMBRE'  => 'PARAJE'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 4,
                    'TIPOASENTAMIENTONOMBRE'  => 'FRACCION'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 5,
                    'TIPOASENTAMIENTONOMBRE'  => 'CANTON'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 6,
                    'TIPOASENTAMIENTONOMBRE'  => 'EJIDO'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 7,
                    'TIPOASENTAMIENTONOMBRE'  => 'UNIDAD HABITACIONAL'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 8,
                    'TIPOASENTAMIENTONOMBRE'  => 'HACIENDA'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 9,
                    'TIPOASENTAMIENTONOMBRE'  => 'GRANJA'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 10,
                    'TIPOASENTAMIENTONOMBRE'  => 'RINCONADA'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 11,
                    'TIPOASENTAMIENTONOMBRE'  => 'INGENIO'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 12,
                    'TIPOASENTAMIENTONOMBRE'  => 'EXHACIENDA'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 13,
                    'TIPOASENTAMIENTONOMBRE'  => 'RESIDENCIAL'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 14,
                    'TIPOASENTAMIENTONOMBRE'  => 'PROLONGACION'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 15,
                    'TIPOASENTAMIENTONOMBRE'  => 'COLONIA'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 16,
                    'TIPOASENTAMIENTONOMBRE'  => 'CONDOMINIO'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 17,
                    'TIPOASENTAMIENTONOMBRE'  => 'PARQUE INDUSTRIAL'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 18,
                    'TIPOASENTAMIENTONOMBRE'  => 'NO APLICA'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 19,
                    'TIPOASENTAMIENTONOMBRE'  => 'SECCION'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 20,
                    'TIPOASENTAMIENTONOMBRE'  => 'REGION'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 21,
                    'TIPOASENTAMIENTONOMBRE'  => 'CIUDAD INDUSTRIAL'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 22,
                    'TIPOASENTAMIENTONOMBRE'  => 'FRACCIONAMIENTO'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 23,
                    'TIPOASENTAMIENTONOMBRE'  => 'PUEBLO'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 24,
                    'TIPOASENTAMIENTONOMBRE'  => 'VILLA'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 25,
                    'TIPOASENTAMIENTONOMBRE'  => 'AMPLIACION'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 26,
                    'TIPOASENTAMIENTONOMBRE'  => 'CARRETERA'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 27,
                    'TIPOASENTAMIENTONOMBRE'  => 'PUERTO'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 28,
                    'TIPOASENTAMIENTONOMBRE'  => 'CUARTEL'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 29,
                    'TIPOASENTAMIENTONOMBRE'  => 'BARRIO'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 30,
                    'TIPOASENTAMIENTONOMBRE'  => 'RANCHERIA'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 31,
                    'TIPOASENTAMIENTONOMBRE'  => 'RANCHO'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 32,
                    'TIPOASENTAMIENTONOMBRE'  => 'SIN INFORMACION'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 33,
                    'TIPOASENTAMIENTONOMBRE'  => 'CIUDAD'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 34,
                    'TIPOASENTAMIENTONOMBRE'  => 'ZONA MILITAR'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 35,
                    'TIPOASENTAMIENTONOMBRE'  => 'NO ESPECIFICADO'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 36,
                    'TIPOASENTAMIENTONOMBRE'  => 'SECTOR'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 37,
                    'TIPOASENTAMIENTONOMBRE'  => 'AEROPUERTO'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 38,
                    'TIPOASENTAMIENTONOMBRE'  => 'MANZANA'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 39,
                    'TIPOASENTAMIENTONOMBRE'  => 'CONJUNTO HABITACIONAL'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 40,
                    'TIPOASENTAMIENTONOMBRE'  => 'ZONA INDUSTRIAL'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 41,
                    'TIPOASENTAMIENTONOMBRE'  => 'PRIVADA'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 42,
                    'TIPOASENTAMIENTONOMBRE'  => 'SUPERMANZANA'
                ],
                [
                    'TIPOASENTAMIENTOID'       => 43,
                    'TIPOASENTAMIENTONOMBRE'  => 'UNIDAD'
                ]

           ]
       );
    }
}
