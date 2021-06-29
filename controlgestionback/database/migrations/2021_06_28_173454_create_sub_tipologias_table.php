<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubTipologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_tipologias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TIPOLOGIAID');
            $table->string('SUBTIPOLOGIAID');
            $table->string('SUBTIPOLOGIANOMBRE');
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
        Schema::dropIfExists('sub_tipologias');
    }
}
