<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessedPayrollConceptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processed_payroll_concepts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('processed_payroll_id')->nullable();
            $table->string('name');
            $table->string('code');
            $table->string('sat_identifier'); // Static code
            $table->unsignedBigInteger('cat_concept_type_id'); // Perception, Deduction or a Provision
            $table->float('amount', 8, 2)->nullable();
            $table->boolean('should_print');
            $table->boolean('is_pantry_voucher')->default(false);
            $table->float('taxable_amount', 8, 2)->nullable();
            $table->timestamps();

            $table->foreign('processed_payroll_id')
                ->references('id')
                ->on('processed_payrolls');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processed_payroll_concepts');
    }
}
