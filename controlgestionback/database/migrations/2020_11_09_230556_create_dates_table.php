<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('start')->nullable();
            $table->string('color');
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->unsignedBigInteger('cat_contract_type_id');
            
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('cat_contract_type_id')->references('id')->on('cat_contract_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dates');
    }
}
