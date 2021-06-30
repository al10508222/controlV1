<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class NivelAtencionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('nivel_atencion')->delete();
        \DB::table('nivel_atencion')->insert(
           [
               [
                   'NIVELATENCIONID'       => 1,
                   'NIVELATENCIONNOMBRE'  => 'PRIMER NIVEL'
               ],
               [
                   'NIVELATENCIONID'       => 2,
                   'NIVELATENCIONNOMBRE'  => 'SEGUNDO NIVEL'
               ],
               [
                   'NIVELATENCIONID'       => 3,
                   'NIVELATENCIONNOMBRE'  => 'TERCER NIVEL'
               ],
               [
                   'NIVELATENCIONID'       => 4,
                   'NIVELATENCIONNOMBRE'  => 'NO APLICA'
               ]
            ]
       );

       \DB::statement('ALTER SEQUENCE "nivel_atencion_NIVELATENCIONID_seq" RESTART WITH 5');
    }
}
