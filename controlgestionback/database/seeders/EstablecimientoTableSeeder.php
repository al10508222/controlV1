<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class EstablecimientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('establecimiento')->delete();
        \DB::table('establecimiento')->insert(
           [
               [
                   'TIPOESTABLECIMIENTOID'       => 1,
                   'TIPOESTABLECIMIENTONOMBRE'  => 'DE APOYO'
               ],
               [
                   'TIPOESTABLECIMIENTOID'       => 2,
                   'TIPOESTABLECIMIENTONOMBRE'  => 'DE ASISTENCIA SOCIAL'
               ],
               [
                   'TIPOESTABLECIMIENTOID'       => 3,
                   'TIPOESTABLECIMIENTONOMBRE'  => 'DE CONSULTA EXTERNA'
               ],
               [
                   'TIPOESTABLECIMIENTOID'       => 4,
                   'TIPOESTABLECIMIENTONOMBRE'  => 'DE HOSPITALIZACION'
               ],
           ]
       );
    }
}
