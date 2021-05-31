<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CatalogoCucop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo_cucop', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo');
            $table->string('clave_cucop');
            $table->string('partida_especifica');
            $table->string('clave_cucop2');
            $table->string('descripcion');
            $table->integer('nivel');
            $table->string('cabm');
            $table->string('unidad_medida');
            $table->string('tipo_contratacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogo_cucop');
    }
}
