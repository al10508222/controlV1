<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatSpecificBudgetItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_specific_budget_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chapter');
            $table->unsignedBigInteger('concept');
            $table->unsignedBigInteger('generic');
            $table->unsignedBigInteger('specific');
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
        Schema::dropIfExists('cat_specific_budget_items');
    }
}
