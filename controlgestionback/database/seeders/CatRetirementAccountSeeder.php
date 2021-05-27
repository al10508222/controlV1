<?php

namespace Database\Seeders;

use App\Models\CatRetirementAccount;
use Illuminate\Database\Seeder;

class CatRetirementAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CatRetirementAccount::create([
            'name'           => 'Bancomer',
            'account_number' => '100293008'
        ]);
        CatRetirementAccount::create([
            'name'            =>  "HSBC",
            'account_number'  =>  "200384009"
        ]);
    }
}
