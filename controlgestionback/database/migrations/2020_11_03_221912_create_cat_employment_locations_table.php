<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatEmploymentLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_employment_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('country')->unsigned()->nullable();
            $table->Integer('state')->nullable();
            $table->string('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('ext_num')->nullable();
            $table->string('int_num')->nullable();
            $table->decimal('latitude', 20, 15)->nullable();
            $table->decimal('longitude', 20, 14)->nullable();
            $table->softDeletes();
	        $table->boolean('isActive')->default(1);
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
        Schema::dropIfExists('cat_employment_locations');
    }
}
