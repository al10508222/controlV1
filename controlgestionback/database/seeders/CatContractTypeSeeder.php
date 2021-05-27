<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatContractType;


class CatContractTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatContractType::create([
            'id'            => 1,
            'name'          => 'Institucional',
            'christmas_bonus_days' => 90,
            'holidays' => 20
        ]);
        CatContractType::create([
            'id'            => 2,
            'name'          => 'Eventual',
            'christmas_bonus_days' => 15,
            'holidays' => 6
        ]);
        CatContractType::create([
            'id'            => 3,
            'name'          => 'Becarios',
            'christmas_bonus_days' => 0,
            'holidays' => 0
        ]);
        \DB::statement('ALTER SEQUENCE cat_contract_types_id_seq RESTART WITH 4');
    }
}
