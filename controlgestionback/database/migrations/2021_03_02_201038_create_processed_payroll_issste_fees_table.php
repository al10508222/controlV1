<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessedPayrollIsssteFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processed_payroll_issste_fees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('processed_payroll_id')->unsigned();
            $table->bigInteger('cat_concept_issste_deduction_id')->unsigned();
            $table->float('worker_amount', 8, 2)->nullable();
            $table->float('employer_amount', 8, 2)->nullable();
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
        Schema::dropIfExists('processed_payroll_issste_fees');
    }
}
