<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('cat_unit_id')->unsigned();
            $table->unsignedBigInteger('cat_tabulator_id')->unsigned();
            $table->boolean('is_available')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cat_unit_id')->references('id')->on('cat_units');
            $table->foreign('cat_tabulator_id')->references('id')->on('cat_tabulators');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
