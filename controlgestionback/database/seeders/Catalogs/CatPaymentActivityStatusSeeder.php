<?php

namespace Database\Seeders\Catalogs;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatPaymentActivityStatus;

class CatPaymentActivityStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatPaymentActivityStatus::create([
            'id'                => 1,
            'name'              => 'EN PROCESO',
        ]);
        CatPaymentActivityStatus::create([
            'id'                => 2,
            'name'              => 'TERMINADA',
        ]);
    }
}
