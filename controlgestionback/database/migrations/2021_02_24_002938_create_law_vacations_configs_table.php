<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLawVacationsConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('law_vacations_configs', function (Blueprint $table) {
            $table->id();
            $table->integer('law_vacations_id')->unsigned();
            $table->integer('days');
            $table->integer('from');
            $table->integer('to');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('law_vacations_id')
                ->references('id')
                ->on('law_vacations')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('law_vacations_configs');
    }
}
