<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeVacationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_vacations', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->unsigned();
            $table->json('days')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('cat_contract_types', function (Blueprint $table) {
            $table->integer('cat_vacations_type_id')->unsigned()->nullable();

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
        Schema::dropIfExists('employee_vacations');
    }
}
