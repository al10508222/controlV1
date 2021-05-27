<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatCustomFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_custom_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->bigInteger('cat_modules_id')->unsigned()->nullable();
            $table->bigInteger('cat_type_data_id')->unsigned()->nullable();
            $table->bigInteger('length')->unsigned()->nullable();
            $table->boolean('is_required')->default(0);
            $table->boolean('calculator_field')->default(0);
            $table->string('default_value')->nullable();
            $table->bigInteger('cat_core_expression_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cat_modules_id')
                ->references('id')
                ->on('cat_modules');
            $table->foreign('cat_type_data_id')
                ->references('id')
                ->on('cat_type_data');
            $table->foreign('cat_core_expression_id')
                ->references('id')
                ->on('cat_core_expressions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_custom_fields');
    }
}
