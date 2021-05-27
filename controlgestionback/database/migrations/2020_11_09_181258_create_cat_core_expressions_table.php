<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatCoreExpressionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_core_expressions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->bigInteger('cat_core_expression_type_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cat_core_expression_type_id')
                ->references('id')
                ->on('cat_core_expression_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_core_expressions');
    }
}
