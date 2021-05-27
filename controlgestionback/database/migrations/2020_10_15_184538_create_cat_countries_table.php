<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('countryCode');
            $table->string('iso2');
            $table->string('nationality')->nullable();
            $table->boolean('isActive')->default(1);
            $table->softDeletes('deleted_at', 0);
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
        Schema::dropIfExists('cat_countries');
    }
}
