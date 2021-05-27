<?php

namespace Database\Seeders;

use App\Models\ImssConfig;

use Illuminate\Database\Seeder;

class ImssConfigsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImssConfig::create([
            "id"                            => 1,
            "imss_deduction_id"             => 1,
            "cat_concept_imss_deduction_id" => 1,
            "employer_fee"                  => 20.4,
            "worker_fee"                    => 0,
        ]);
        ImssConfig::create([
            "id"                            => 2,
            "imss_deduction_id"             => 1,
            "cat_concept_imss_deduction_id" => 2,
            "employer_fee"                  => 1.1,
            "worker_fee"                    => 0.4,
        ]);
        ImssConfig::create([
            "id"                            => 3,
            "imss_deduction_id"             => 1,
            "cat_concept_imss_deduction_id" => 3,
            "employer_fee"                  => 0.7,
            "worker_fee"                    => 0.25,
        ]);
        ImssConfig::create([
            "id"                            => 4,
            "imss_deduction_id"             => 1,
            "cat_concept_imss_deduction_id" => 4,
            "employer_fee"                  => 1.05,
            "worker_fee"                    => 0.375,
        ]);
        ImssConfig::create([
            "id"                            => 5,
            "imss_deduction_id"             => 1,
            "cat_concept_imss_deduction_id" => 5,
            "employer_fee"                  => 1.75,
            "worker_fee"                    => 0.625,
        ]);
        ImssConfig::create([
            "id"                            => 6,
            "imss_deduction_id"             => 1,
            "cat_concept_imss_deduction_id" => 6,
            "employer_fee"                  => 1,
            "worker_fee"                    => 0,
        ]);
        ImssConfig::create([
            "id"                            => 7,
            "imss_deduction_id"             => 1,
            "cat_concept_imss_deduction_id" => 7,
            "employer_fee"                  => 0.5000,
            "worker_fee"                    => 0,
        ]);
        ImssConfig::create([
            "id"                            => 8,
            "imss_deduction_id"             => 1,
            "cat_concept_imss_deduction_id" => 8,
            "employer_fee"                  => 2,
            "worker_fee"                    => 0,
        ]);
        ImssConfig::create([
            "id"                            => 9,
            "imss_deduction_id"             => 1,
            "cat_concept_imss_deduction_id" => 9,
            "employer_fee"                  => 3.15,
            "worker_fee"                    => 1.125,
        ]);
        ImssConfig::create([
            "id"                            => 10,
            "imss_deduction_id"             => 1,
            "cat_concept_imss_deduction_id" => 10,
            "employer_fee"                  => 5,
            "worker_fee"                    => 0,
        ]);
        
        \DB::statement('ALTER SEQUENCE imss_configs_id_seq RESTART WITH 11');
    }   
}
