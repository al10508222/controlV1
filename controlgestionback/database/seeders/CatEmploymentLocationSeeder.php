<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatEmploymentLocation;

class CatEmploymentLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $location = new CatEmploymentLocation();
        $location->name = 'INFOTEC';
        $location->country = 142;
        $location->state = 2435;
        $location->address = 'Av. San Fernando 37, Toriello Guerra, Tlalpan';
        $location->zipcode = '14050';
        $location->ext_num = '37';
        $location->int_num = '0';
        $location->latitude = 19.2910548;
        $location->longitude = -99.1654811;
        $location->save();

        $location = new CatEmploymentLocation();
        $location->name = 'Aguascalientes';
        $location->country = 142;
        $location->state = 2427;
        $location->address = 'Av. San Fernando 37, Toriello Guerra, Tlalpan';
        $location->zipcode = '14050';
        $location->ext_num = '37';
        $location->int_num = '0';
        $location->latitude = 19.2910548;
        $location->longitude = -99.1654811;
        $location->save();

    }

}
