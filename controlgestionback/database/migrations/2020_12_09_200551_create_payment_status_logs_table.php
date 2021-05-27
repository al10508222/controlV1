<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentStatusLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_status_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_payment_status_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('user_external_id')->nullable();
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
        Schema::dropIfExists('payment_status_logs');
    }
}
