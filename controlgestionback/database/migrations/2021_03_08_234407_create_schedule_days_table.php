<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('schedule_id')->nullable();
            $table->unsignedBigInteger('cat_day_id')->nullable();
            $table->string('hour_in')->nullable();
            $table->string('break_in')->nullable();
            $table->string('break_out')->nullable();
            $table->string('hour_out')->nullable();
            $table->boolean('is_rest_day')->default(0);

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('schedule_id')
            ->references('id')
            ->on('schedules')
            ->onDelete('cascade');

            $table->foreign('cat_day_id')
            ->references('id')
            ->on('cat_days')
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
        Schema::dropIfExists('schedule_days');
    }
}
