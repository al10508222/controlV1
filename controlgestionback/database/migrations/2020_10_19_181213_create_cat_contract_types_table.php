<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatContractTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_contract_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('christmas_bonus_days')->nullable();
            $table->unsignedInteger('gratification_days')->nullable();
            $table->unsignedInteger('holidays')->nullable();
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
        Schema::dropIfExists('cat_contract_types');
    }
}
