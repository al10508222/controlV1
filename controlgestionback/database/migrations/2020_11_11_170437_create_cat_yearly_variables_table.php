<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatYearlyVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_yearly_variables', function (Blueprint $table) {
            $table->id();
            $table->float('value', 8, 2);
            $table->integer('year');
            $table->bigInteger('cat_yearly_variable_type_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('cat_yearly_variable_type_id')
                ->references('id')
                ->on('cat_yearly_variable_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_yearly_variables');
    }
}
