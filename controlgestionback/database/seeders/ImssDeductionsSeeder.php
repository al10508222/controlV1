<?php

namespace Database\Seeders;

use App\Models\ImssDeductions;
use Illuminate\Database\Seeder;

class ImssDeductionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        ImssDeductions::create([
            "id"   => 1,
            "name" => "Cuotas IMSS 2021",
            "year" => "2021"
        ]);

        \DB::statement('ALTER SEQUENCE imss_deductions_id_seq RESTART WITH 2');
    }
}
