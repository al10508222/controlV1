<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_reports', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('name');
            $table->unsignedInteger('reports_section_id');
            $table->timestamps();

            $table->foreign('reports_section_id')->references('id')->on('reports_group_section');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_reports');
    }
}
