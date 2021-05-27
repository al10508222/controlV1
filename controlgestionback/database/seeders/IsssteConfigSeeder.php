<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IsssteConfig;

class IsssteConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IsssteConfig::create([
            "id"                            => 1,
            "issste_deduction_id"           => 1,
            "cat_concept_issste_deduction_id" => 1,
            "worker_fee"                    => 2.75,
            "employer_fee"                  => 7.375,
        ]);
        IsssteConfig::create([
            "id"                            => 2,
            "issste_deduction_id"           => 1,
            "cat_concept_issste_deduction_id" => 2,
            "worker_fee"                    => 0.625,
            "employer_fee"                  => 0.72,
        ]);
        IsssteConfig::create([
            "id"                            => 3,
            "issste_deduction_id"           => 1,
            "cat_concept_issste_deduction_id" => 3,
            "worker_fee"                    => 0.0,
            "employer_fee"                  => 0.75,
        ]);
        IsssteConfig::create([
            "id"                            => 4,
            "issste_deduction_id"           => 1,
            "cat_concept_issste_deduction_id" => 4,
            "worker_fee"                    => 0.0,
            "employer_fee"                  => 2,
        ]);
        IsssteConfig::create([
            "id"                            => 5,
            "issste_deduction_id"           => 1,
            "cat_concept_issste_deduction_id" => 5,
            "worker_fee"                    => 6.125,
            "employer_fee"                  => 3.175,
        ]);
        IsssteConfig::create([
            "id"                            => 6,
            "issste_deduction_id"           => 1,
            "cat_concept_issste_deduction_id" => 6,
            "worker_fee"                    => 0.625,
            "employer_fee"                  => 0.625,
        ]);
        IsssteConfig::create([
            "id"                            => 7,
            "issste_deduction_id"           => 1,
            "cat_concept_issste_deduction_id" => 7,
            "worker_fee"                    => 0,
            "employer_fee"                  => 5,
        ]);
        IsssteConfig::create([
            "id"                            => 8,
            "issste_deduction_id"           => 1,
            "cat_concept_issste_deduction_id" => 8,
            "worker_fee"                    => 0.5,
            "employer_fee"                  => 0.5,
        ]);

        \DB::statement('ALTER SEQUENCE issste_configs_id_seq RESTART WITH 9');
    }
}
