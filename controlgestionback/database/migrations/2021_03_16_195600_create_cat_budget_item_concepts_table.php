<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatBudgetItemConceptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_budget_item_concepts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chapter'); // is not an id
            $table->unsignedBigInteger('concept'); // is not an id
            $table->string('code');
            $table->string('description');
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
        Schema::dropIfExists('cat_budget_item_concepts');
    }
}
