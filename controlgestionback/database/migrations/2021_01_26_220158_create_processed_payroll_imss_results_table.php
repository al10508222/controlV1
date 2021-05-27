<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessedPayrollImssResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    /* processed_payroll_issste_fees [
            processed_payroll_id,
            cat_concept_issste_deduction_id,
            amount_worker,
            amount_employer
            ] 
    */
        Schema::create('processed_payroll_imss_results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('processed_payroll_id')->unsigned()->nullable();
            $table->float('monthly_employer_amount', 8, 2)->nullable();
            $table->float('bimonthly_employer_amount', 8, 2)->nullable();
            $table->float('infonavit_employer_amount', 8, 2)->nullable();
            $table->float('monthly_worker_amount', 8, 2)->nullable();
            $table->float('bimonthly_worker_amount', 8, 2)->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processed_payroll_imss_results');
    }
}
