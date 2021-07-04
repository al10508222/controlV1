<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurisdiccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurisdiccion', function (Blueprint $table) {
            $table->id('id');
            $table->Integer('ENTIDADFEDERATIVAID');
            $table->Integer('JURISDICCIONID');   
            $table->string('JURISDICCIONNOMBRE');  
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
        Schema::dropIfExists('jurisdiccion');
    }
}
