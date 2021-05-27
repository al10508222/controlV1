<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConceptHasCoreExpression extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concept_has_core_expression', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('concept_id');
            $table->unsignedBigInteger('cat_core_expression_id');
            $table->unsignedInteger('expression_index');
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
        Schema::dropIfExists('concept_has_core_expression');
    }
}
