<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessedPayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processed_payrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger("payroll_id");
            $table->unsignedBigInteger("file_id")->nullable();
            $table->string('code');
            $table->string('name');
            $table->string('nss');
            $table->string('rfc');
            $table->string('curp');
            $table->date('date_admission');
            $table->string('bank');
            $table->string('bank_identifier');
            $table->string('department');
            $table->string('account')->nullable();
            $table->string('clabe')->nullable();
            $table->string('position')->nullable();
            $table->string('type_salary');
            $table->float('total_pantry_vouchers', 8, 2)->nullable(); // Only amount cash, to generate layout
            $table->float('total_perceptions', 8, 2)->nullable();
            $table->float('total_deductions', 8, 2)->nullable();
            $table->json('configuration')->nullable();
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
        Schema::dropIfExists('processed_payrolls');
    }
}
