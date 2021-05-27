<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsGroupSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports_group_section', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('report_group_id');
            $table->timestamps();

            $table->foreign('report_group_id')->references('id')->on('reports_group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports_group_section');
    }
}
