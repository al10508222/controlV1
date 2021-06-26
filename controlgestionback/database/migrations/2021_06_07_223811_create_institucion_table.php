<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institucion', function (Blueprint $table) {
            // $table->increments('id'); //NOTA: no se puede colocar un id tipo caracter en postgresql, ademas de que la el nombre corto
            // $table->string('INSTITUCIONNOMBRE');  
            // $table->bigInteger('INSTITUCIONIDCORTO');  
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('institucion');
    }
}
