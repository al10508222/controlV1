<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localidades', function (Blueprint $table) {
            $table->increments('ID');
            $table->Integer('ENTIDADFEDERATIVAID');
            $table->Integer('MUNICIPIOID');
            $table->Integer('LOCALIDADID');
            $table->string('LOCALIDADNOMBRE');  
            $table->string('LOCALIDADCODIGOPOSTAL')->nullable();  
            $table->string('LOCALIDADAMBITO');
            $table->string('LOCALIDADLATITUD');  
            $table->string('LOCALIDADLOINGITUD');  
            $table->string('LOCALIDADLATITUDDEC');  
            $table->string('LOCALIDADLOINGITUDDEC');  
            $table->string('LOCALIDADALTITUD');  
            $table->foreign('ENTIDADFEDERATIVAID')->references('ENTIDADFEDERATIVAID')->on('entidades')->onDelete('cascade');
            $table->foreign('MUNICIPIOID')->references('MUNICIPIOID')->on('municipios')->onDelete('cascade');
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
        Schema::dropIfExists('localidades');
    }
}
