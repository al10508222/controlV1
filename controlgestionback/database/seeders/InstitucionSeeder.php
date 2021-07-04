<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InstitucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('institucions')->insert(
            [
                [
                    'id'                    => 1,
                    'INSTITUCIONID'         =>'SSA',
                    'INSTITUCIONNOMBRE'     =>'SSA',
                    'INSTITUCIONIDCORTO'    =>'SECRETARIA DE SALUD'
                ],
                [
                    'id'                    => 2,
                    'INSTITUCIONID'         =>'CIJ',
                    'INSTITUCIONNOMBRE'     =>'CIJ',
                    'INSTITUCIONIDCORTO'    =>'CENTROS DE INTEGRACION JUVENIL'
                ],
                [
                    'id'                    => 3,
                    'INSTITUCIONID'         =>'SME',
                    'INSTITUCIONNOMBRE'     =>'SME',
                    'INSTITUCIONIDCORTO'    =>'SERVICIOS MEDICOS ESTATALES'
                ],
                [
                    'id'                    => 4,
                    'INSTITUCIONID'         =>'SMM',
                    'INSTITUCIONNOMBRE'     =>'SMM',
                    'INSTITUCIONIDCORTO'    =>'SERVICIOS MEDICOS MUNICIPALES'
                ],
                [
                    'id'                    => 5,
                    'INSTITUCIONID'         =>'SEMAR',
                    'INSTITUCIONNOMBRE'     =>'SMA',
                    'INSTITUCIONIDCORTO'    =>'SECRETARIA DE MARINA'
                ],
                [
                    'id'                    => 6,
                    'INSTITUCIONID'         =>'FGE',
                    'INSTITUCIONNOMBRE'     =>'FGE',
                    'INSTITUCIONIDCORTO'    =>'FISCALIA GENERAL DEL ESTADO'
                ],
                [
                    'id'                    => 7,
                    'INSTITUCIONID'         =>'SMP',
                    'INSTITUCIONNOMBRE'     =>'SMP',
                    'INSTITUCIONIDCORTO'    =>'SERVICIOS MEDICOS PRIVADOS'
                ],
                [
                    'id'                    => 8,
                    'INSTITUCIONID'         =>'PEMEX',
                    'INSTITUCIONNOMBRE'     =>'PMX',
                    'INSTITUCIONIDCORTO'    =>'PETROLEOS MEXICANOS'
                ],
                [
                    'id'                    => 9,
                    'INSTITUCIONID'         =>'CRO',
                    'INSTITUCIONNOMBRE'     =>'CRO',
                    'INSTITUCIONIDCORTO'    =>'CRUZ ROJA MEXICANA'
                ]
           ]
        );
        \DB::statement('ALTER SEQUENCE public.institucions_id_seq RESTART WITH 10');
    }
}
