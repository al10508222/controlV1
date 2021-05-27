<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatVacationsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_vacations_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('description', 150);
            $table->enum('type', ['fixed', 'law']);
            $table->integer('law_vacations_id')->unsigned()->nullable();
            $table->integer('deferred_annual_days')->nullable();
            $table->integer('minimum_service_months')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('law_vacations_id')
                ->references('id')
                ->on('law_vacations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_vacations_types');
    }
}
