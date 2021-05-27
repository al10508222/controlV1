<?php

namespace Database\Seeders;

use App\Models\EmployeeAddress;
use Illuminate\Database\Seeder;

class EmployeeAddressSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeAddress::factory()->count(500)->create(); 
    }
}
