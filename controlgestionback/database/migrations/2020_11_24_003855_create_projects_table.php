<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_key');
            $table->string('speciality');
            $table->string('specific');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('unit_id');

            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('client_id')
            ->references('id')
            ->on('clients')
            ->onDelete('cascade');

            $table->foreign('unit_id')
            ->references('id')
            ->on('cat_units');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
