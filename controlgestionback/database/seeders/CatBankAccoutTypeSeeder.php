<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogs\CatBankAccountType;

class CatBankAccoutTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatBankAccountType::create([
            'id'                => 1,
            'identifier'        => '01',
            'name'              => 'Cheques',
        ]);
        CatBankAccountType::create([
            'id'                => 2,
            'identifier'        => '03',
            'name'              => 'Tarjeta de Debito interbancaria',
        ]);
        CatBankAccountType::create([
            'id'                => 3,
            'identifier'        => '40',
            'name'              => 'Cuenta CLABE',
        ]);
        CatBankAccountType::create([
            'id'                => 4,
            'identifier'        => '97',
            'name'              => 'Tarjeta mi despensa',
        ]);
        CatBankAccountType::create([
            'id'                => 5,
            'identifier'        => '98',
            'name'              => 'Tarjeta de pagos',
        ]);
    }
}
