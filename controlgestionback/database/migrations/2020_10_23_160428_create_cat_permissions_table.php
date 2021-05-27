<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('key',255);
            $table->text('description')->nullable();
            $table->integer('module_id')->unsigned();
            $table->timestamps();

            $table->foreign('module_id')->references('id')->on('cat_modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_permissions');
    }
}
