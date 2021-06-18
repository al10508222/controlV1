<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacoraProcesoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('bitacora_proceso', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('proceso_nombre');  
        //     $table->string('proceso_mensaje');  
        //     $table->string('proceso_sql_code');  
        //     $table->string('proceso_sql_error');  
        //     $table->date('proceso_fecha');  
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
        // Schema::dropIfExists('bitacora_proceso');
    }
}
