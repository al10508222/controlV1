<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollEmploymentSubsidiesConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_employment_subsidies_configs', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_periodicity_type_id')->unsigned();
            $table->string('name');
            $table->string('year');
            $table->foreign('cat_periodicity_type_id')
            ->references('id')
            ->on('cat_periodicity_types');
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
        Schema::dropIfExists('payroll_employment_subsidies_configs');
    }
}
