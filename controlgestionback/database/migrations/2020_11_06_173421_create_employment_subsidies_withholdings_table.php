<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentSubsidiesWithholdingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_subsidies_withholdings', function (Blueprint $table) {
            $table->id();
            $table->integer('payroll_employment_subsidies_configs_id')->unsigned();
            $table->bigInteger('lower_limit');
            $table->bigInteger('upper_limit');
            $table->bigInteger('subsidy');
            $table->foreign('payroll_employment_subsidies_configs_id')
            ->references('id')
            ->on('payroll_employment_subsidies_configs');
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
        Schema::dropIfExists('employment_subsidies_withholdings');
    }
}
