<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class SubTipologiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sub_tipologias')->delete();
        $json = File::get(__DIR__ . '/json/subtipologias.json');

        $data = json_decode($json);

        foreach ($data as $item){
             \DB::table('sub_tipologias')->insert(
                [
                    [
                        'TIPOLOGIAID'   => $item->TIPOLOGIAID,
                        'SUBTIPOLOGIAID'   => $item->SUBTIPOLOGIAID,
                        'SUBTIPOLOGIANOMBRE'   => $item->SUBTIPOLOGIANOMBRE
                    ]
                ]
            );
        }
    }
}
