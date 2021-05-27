<?php

namespace Database\Seeders;

use App\Models\IsssteDeduction;
use Illuminate\Database\Seeder;

class IsssteDeductionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IsssteDeduction::create([
            "id"   => 1,
            "name" => "Cuotas ISSSTE 2021",
            "year" => "2021"
        ]);
        \DB::statement('ALTER SEQUENCE issste_deductions_id_seq RESTART WITH 2');
    }
}
