<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class LocalidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        \DB::table('localidades')->delete();
        $json = File::get(__DIR__ . '/json/localidades.json');

        $data = json_decode($json);

        foreach ($data as $item){
             \DB::table('localidades')->insert(
                [
                    [
                        'ENTIDADFEDERATIVAID'   => $item->ENTIDADFEDERATIVAID,
                        'MUNICIPIOID'   => $item->MUNICIPIOID,
                        'LOCALIDADID'   => $item->LOCALIDADID,
                        'LOCALIDADNOMBRE'   => $item->LOCALIDADNOMBRE,
                        'LOCALIDADCODIGOPOSTAL'   => NULL,
                        'LOCALIDADAMBITO'   => $item->LOCALIDADAMBITO,
                        'LOCALIDADLATITUD'   => $item->LOCALIDADLATITUD,
                        'LOCALIDADLOINGITUD'   => $item->LOCALIDADLOINGITUD,
                        'LOCALIDADLATITUDDEC'   => $item->LOCALIDADLATITUDDEC,
                        'LOCALIDADLOINGITUDDEC'   => $item->LOCALIDADLOINGITUDDEC,
                        'LOCALIDADALTITUD'   => $item->LOCALIDADALTITUD
                    ]
                ]
            );
        }
    }
}
