<?php

namespace Database\Seeders\Catalogs;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatEmployeeStatus;

class CatEmployeeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatEmployeeStatus::create([
            'id'                => 1,
            'name'              => 'PRE REGISTRADO',
        ]);
        CatEmployeeStatus::create([
            'id'                => 2,
            'name'              => 'REGISTRADO',
        ]);
    }
}
