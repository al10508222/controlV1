<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImssConfigs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imss_configs', function (Blueprint $table) {
            $table->id();
            $table->integer('imss_deduction_id')->unsigned();
            $table->integer('cat_concept_imss_deduction_id')->unsigned();
            $table->decimal('employer_fee', 7, 4);
            $table->decimal('worker_fee', 7, 4);
            $table->timestamps();
            
            $table->foreign('imss_deduction_id')
            ->references('id')
            ->on('imss_deductions')
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
        Schema::dropIfExists('imss_configs');
    }
}
