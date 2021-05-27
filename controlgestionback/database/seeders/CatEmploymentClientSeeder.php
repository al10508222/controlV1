<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatEmploymentClient;

class CatEmploymentClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatEmploymentClient::create([
            'id'                =>  1,
            'name'              =>  'GN',
        ]);
        CatEmploymentClient::create([
            'id'                => 2,
            'name'              => 'SRE',
        ]);
        CatEmploymentClient::create([
            'id'                => 3,
            'name'              => 'Otro',
        ]);
    }
}
