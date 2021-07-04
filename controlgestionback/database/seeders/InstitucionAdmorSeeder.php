<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InstitucionAdmorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('institucion_adm_or')->insert(
            [
                [
                    'id'                        => 1,
                    'INSTITUCIONADMORID'        => 'SESA',
                    'INSTITUCIONADMORNOMBRE'    => 'SECRETARIA DE SALUD ESTATAL',
                ],
                [
                    'id'                        => 2,
                    'INSTITUCIONADMORID'        => '99',
                    'INSTITUCIONADMORNOMBRE'    => 'NO ESPECIFICADO',
                ],
                [
                    'id'                        => 3,
                    'INSTITUCIONADMORID'        =>'SAP',
                    'INSTITUCIONADMORNOMBRE'    =>'SAP',
                ],
                [
                    'id'                        => 4,
                    'INSTITUCIONADMORID'        => 'SEMAR',
                    'INSTITUCIONADMORNOMBRE'    => 'SECRETARIA DE MARINA',
                ],
                [
                    'id'                        => 5,
                    'INSTITUCIONADMORID'        => 'FGE',
                    'INSTITUCIONADMORNOMBRE'    => 'FISCALIA GENERAL DEL ESTADO',
                ],
                [
                    'id'                        => 6,
                    'INSTITUCIONADMORID'        => 'IMSS',
                    'INSTITUCIONADMORNOMBRE'    => 'INSTITUTO MEXICANO DEL SEGURO SOCIAL',
                ],
                [
                    'id'                        => 7,
                    'INSTITUCIONADMORID'        => 'IMO',
                    'INSTITUCIONADMORNOMBRE'    => 'INSTITUTO MEXICANO DEL SEGURO SOCIAL. BIENESTAR',
                ],
                [
                    'id'                        => 8,
                    'INSTITUCIONADMORID'        => 'DIFM',
                    'INSTITUCIONADMORNOMBRE'    => 'DIF MUNICIPAL',
                ],
                [
                    'id'                        => 9,
                    'INSTITUCIONADMORID'        => 'CIJ',
                    'INSTITUCIONADMORNOMBRE'    => 'CENTROS DE INTEGRACION JUVENIL',
                ],
                [
                    'id'                        => 10,
                    'INSTITUCIONADMORID'        => 'SSA',
                    'INSTITUCIONADMORNOMBRE'    => 'SECRETARIA DE SALUD FEDERAL',
                ],
                [
                    'id'                        => 11,
                    'INSTITUCIONADMORID'        => 'INSALUD',
                    'INSTITUCIONADMORNOMBRE'    => 'INSTITUTO NACIONAL DE SALUD',
                ],
                [
                    'id'                        => 12,
                    'INSTITUCIONADMORID'        => 'SEDENA',
                    'INSTITUCIONADMORNOMBRE'    => 'SECRETARIA DE LA DEFENSA NACIONAL',
                ],
                [
                    'id'                        => 13,
                    'INSTITUCIONADMORID'        => 'HRAE',
                    'INSTITUCIONADMORNOMBRE'    => 'HOSPITAL REGIONAL DE ALTA ESPECIALIDAD',
                ],
                [
                    'id'                        => 14,
                    'INSTITUCIONADMORID'        => 'HFR',
                    'INSTITUCIONADMORNOMBRE'    => 'HOSPITAL FEDERAL DE REFERENCIA',
                ],
                [
                    'id'                        => 15,
                    'INSTITUCIONADMORID'        => 'MUNICIPAL',
                    'INSTITUCIONADMORNOMBRE'    => 'SERVICIOS MEDICOS MUNICIPALES',
                ],
                [
                    'id'                        => 16,
                    'INSTITUCIONADMORID'        => 'PEMEX',
                    'INSTITUCIONADMORNOMBRE'    => 'PETROLEOS MEXICANOS',
                ],
                [
                    'id'                        => 17,
                    'INSTITUCIONADMORID'        => 'SA',
                    'INSTITUCIONADMORNOMBRE'    => 'SOCIEDAD ANONIMA',
                ],
                [
                    'id'                        => 18,
                    'INSTITUCIONADMORID'        => 'OTRA',
                    'INSTITUCIONADMORNOMBRE'    => 'OTRA',
                ],
                [
                    'id'                        => 19,
                    'INSTITUCIONADMORID'        => 'ESTATAL',
                    'INSTITUCIONADMORNOMBRE'    => 'SERVICIOS MEDICOS ESTATALES',
                ],
                [
                    'id'                        => 20,
                    'INSTITUCIONADMORID'        => 'ONG',
                    'INSTITUCIONADMORNOMBRE'    => 'ORGANISMO NO GUBERNAMENTAL',
                ],
                [
                    'id'                        => 21,
                    'INSTITUCIONADMORID'        => 'CRUZ ROJA',
                    'INSTITUCIONADMORNOMBRE'    => 'CRUZ ROJA MEXICANA',
                ],
                [
                    'id'                        => 22,
                    'INSTITUCIONADMORID'        => 'INSABI',
                    'INSTITUCIONADMORNOMBRE'    => 'INSTITUTO DE SALUD PARA EL BIENESTAR',
                ],
                [
                    'id'                        => 23,
                    'INSTITUCIONADMORID'        => 'PGR',
                    'INSTITUCIONADMORNOMBRE'    => 'PROCURADURIA GENERAL DE LA REPUBLICA',
                ],
                [
                    'id'                        => 24,
                    'INSTITUCIONADMORID'        => 'DIFE',
                    'INSTITUCIONADMORNOMBRE'    => 'DIF ESTATAL',
                ],
                [
                    'id'                        => 25,
                    'INSTITUCIONADMORID'        => 'OPD',
                    'INSTITUCIONADMORNOMBRE'    => 'ORGANISMO PUBLICO DE LA ENTIDAD',
                ],
                [
                    'id'                        => 26,
                    'INSTITUCIONADMORID'        => 'HUN',
                    'INSTITUCIONADMORNOMBRE'    => 'UNIVERSITARIOS',
                ]
           ]
        );
        \DB::statement('ALTER SEQUENCE public.institucion_adm_or_id_seq RESTART WITH 27');
    }
}
