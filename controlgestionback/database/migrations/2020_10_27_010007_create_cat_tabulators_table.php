<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatTabulatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_tabulators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('base_salary_cents');
            $table->unsignedBigInteger('daily_salary_cents')->nullable();
            $table->unsignedBigInteger('compensation_cents')->nullable();
            $table->unsignedBigInteger('cat_contract_type_id');
            $table->foreign('cat_contract_type_id')->references('id')->on('cat_contract_types');
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
        Schema::dropIfExists('cat_tabulators');
    }
}
