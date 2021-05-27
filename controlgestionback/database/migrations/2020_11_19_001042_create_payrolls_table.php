<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->unsignedBigInteger('cat_payroll_status_id');
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('cat_contract_type_id'); // Tipo de contratación. De aqui se sabe a que empleados se generará
            $table->unsignedBigInteger('cat_periodicity_type_id'); // Tipo de periodicidad de la nómina
            $table->dateTime('processing_datetime')->nullable();
            $table->float('period_days', 6, 2)->nullable();
            $table->date('payment_date');
            $table->date('payment_period_start');
            $table->date('payment_period_end');
            $table->softDeletes();
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
        Schema::dropIfExists('payrolls');
    }
}
