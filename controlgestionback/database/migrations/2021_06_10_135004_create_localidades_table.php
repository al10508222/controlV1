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
        // Schema::create('localidades', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->Integer('entidad_id');
        //     $table->string('entidad_nombre');  
        //     $table->string('entidad_nombre_corto');  
        //     $table->Integer('municipio_id');
        //     $table->string('municipio_nombre');
        //     $table->Integer('localidad_id');  
        //     $table->string('localidad_nombre');  
        //     $table->string('ambito');  
        //     $table->foreign('entidad_id')->references('id')->on('entidades')->onDelete('cascade');;
        //     $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade');;
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('localidades');
    }
}
