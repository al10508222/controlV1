<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessedPayrollSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processed_payroll_summaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("payroll_id");
            $table->bigInteger('current_employee');
            $table->bigInteger('total_employee');
            $table->float('total_amount_perceptions', 8, 2)->nullable();
            $table->float('total_amount_deductions', 8, 2)->nullable();
            $table->float('errors', 8, 2)->nullable();
            $table->json('configuration')->nullable();
            $table->timestamps();

            $table->foreign('payroll_id')
                ->references('id')
                ->on('payrolls');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processed_payroll_summary');
    }
}
