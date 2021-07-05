<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ScianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('scians')->insert(
            [
                [
                    'SCIANID'         => 624412,
                    'SCIANNOMBRE'     => 'GUARDERIAS DEL SECTOR PUBLICO',
                ],
                [
                    'SCIANID'         => 621331,
                    'SCIANNOMBRE'     => 'CONSULTORIOS DE PSICOLOGIA DEL SECTOR PRIVADO',
                ],
                [
                    'SCIANID'         => 99999,
                    'SCIANNOMBRE'     => 'NO APLICA',
                ],
                [
                    'SCIANID'         => 622111,
                    'SCIANNOMBRE'     => 'HOSPITALES GENERALES DEL SECTOR PRIVADO',
                ],
                [
                    'SCIANID'         => 622112,
                    'SCIANNOMBRE'     => 'HOSPITALES GENERALES DEL SECTOR PUBLICO',
                ],
                [
                    'SCIANID'         => 621212,
                    'SCIANNOMBRE'     => 'CONSULTORIOS DENTALES DEL SECTOR PUBLICO',
                ],
                [
                    'SCIANID'         => 621211,
                    'SCIANNOMBRE'     => 'CONSULTORIOS DENTALES DEL SECTOR PRIVADO',
                ],
                [
                    'SCIANID'         => 621332,
                    'SCIANNOMBRE'     => 'CONSULTORIOS DE PSICOLOGIA DEL SECTOR PUBLICO',
                ],
                [
                    'SCIANID'         => 621312,
                    'SCIANNOMBRE'     => 'CONSULTORIOS DE QUIROPRACTICA DEL SECTOR PUBLICO',
                ]
           ]
        );
        
        \DB::statement('ALTER SEQUENCE "scians_SCIANID_seq" RESTART WITH 624413');
    }
}
