<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades', function (Blueprint $table) {
            $table->increments('ENTIDADFEDERATIVAID');
            $table->string('ENTIDADFEDERATIVANOMBRE');  
            $table->string('ENTIDADFEDERATIVAABREVIACION');  
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
        Schema::dropIfExists('entidades');
    }
}
