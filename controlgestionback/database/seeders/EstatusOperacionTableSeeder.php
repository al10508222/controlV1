<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class EstatusOperacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('estatus_operacion')->delete();
        \DB::table('estatus_operacion')->insert(
           [
               [
                   'ESTATUSOPERACIONID'       => 1,
                   'ESTATUSOPERACIONNOMBRE'  => 'EN OPERACON'
               ],
               [
                   'ESTATUSOPERACIONID'       => 1,
                   'ESTATUSOPERACIONNOMBRE'  => 'FUERA DE OPERACON'
               ]
           ]
       );
    }
}
