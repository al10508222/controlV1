<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class EstratoUnidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('estratos_unidad')->delete();
        \DB::table('estratos_unidad')->insert(
           [
               [
                    'ESTRATOUNIDADID'       => 1,
                    'ESTRATOUNIDADNOMBRE'  => 'RURAL'
               ],
               [
                    'ESTRATOUNIDADID'       => 2,
                    'ESTRATOUNIDADNOMBRE'  => 'URBANO'
                ],
           ]
       );
    }
}
