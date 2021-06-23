<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class EstatusAcreditacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('estatus_acreditacion')->delete();
        \DB::table('estatus_acreditacion')->insert(
           [
               [
                   'ESTATUSACREDITACIONID'       => 1,
                   'ESTATUSACREDITACIONNOMBRE'  => 'EN OPERACION'
               ]
           ]
       );
    }
}
