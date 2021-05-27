<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacationsTypesPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacations_types_periods', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_vacations_type_id')->unsigned();
            $table->integer('start_day');
            $table->integer('start_month');
            $table->integer('end_day');
            $table->integer('end_month');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cat_vacations_type_id')
                ->references('id')
                ->on('cat_vacations_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacations_deferred_annual_periods');
    }
}
