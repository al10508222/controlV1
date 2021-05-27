<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsrWithholdingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isr_withholdings', function (Blueprint $table) {
            $table->id();
            $table->integer('payrolls_isr_config_id')->unsigned();
            $table->bigInteger('lower_limit');
            $table->bigInteger('upper_limit');
            $table->bigInteger('fixed_fee');
            $table->decimal('percent_over_lower_limit', 7, 2);
            $table->foreign('payrolls_isr_config_id')
            ->references('id')
            ->on('payroll_isr_configs');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('isr_withholdings');
    }
}
