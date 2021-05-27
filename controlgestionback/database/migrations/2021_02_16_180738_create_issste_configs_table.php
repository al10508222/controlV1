<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsssteConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issste_configs', function (Blueprint $table) {
            $table->id();
            $table->integer('issste_deduction_id')->unsigned();
            $table->integer('cat_concept_issste_deduction_id')->unsigned();
            $table->decimal('employer_fee', 7, 4);
            $table->decimal('worker_fee', 7, 4);
            $table->timestamps();

            $table->foreign('issste_deduction_id')
            ->references('id')
            ->on('issste_deductions')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issste_configs');
    }
}
