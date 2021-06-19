<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('municipios', function (Blueprint $table) {
        //     $table->increments('MUNICIPIOID');
        //     $table->Integer('ENTIDADFEDERATIVAID'); 
        //     $table->string('MUNICIPIONOMBRE');  
        //     $table->timestamps();
        //     $table->foreign('ENTIDADFEDERATIVAID')->references('ENTIDADFEDERATIVAID')->on('entidades')->onDelete('cascade');;
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('municipios');
    }
}
