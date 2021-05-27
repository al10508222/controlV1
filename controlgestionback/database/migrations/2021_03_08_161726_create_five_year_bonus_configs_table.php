<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiveYearBonusConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('five_year_bonus_configs', function (Blueprint $table) {
            $table->id();
            $table->integer('five_year_bonuses_id')->unsigned();
            $table->integer('initial_period');
            $table->integer('final_period');
            $table->integer('monthly_amount');
            $table->timestamps();

            $table->foreign('five_year_bonuses_id')
                ->references('id')
                ->on('five_year_bonuses')
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
        Schema::dropIfExists('five_year_bonus_configs');
    }
}
