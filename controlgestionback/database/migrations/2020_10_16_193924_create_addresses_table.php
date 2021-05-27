<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_state_id');
            $table->unsignedBigInteger('employee_id');
            $table->string('town');
            $table->string('neighborhood');
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('ext_num')->nullable();
            $table->string('int_num')->nullable();  
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
        Schema::dropIfExists('employee_addresses');
    }
}
