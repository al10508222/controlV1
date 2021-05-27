<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemPaymentConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_payment_configs', function (Blueprint $table) {
            $table->id();
            $table->string("payment_method");
            $table->string("voucher_type");
            $table->string("qty");
            $table->string("currency");
            $table->string("payment_way");
            $table->string("tax_regime");
            $table->string("voucher_usage");
            $table->string("unity_key");
            $table->string("unity");
            $table->string("description");
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
        Schema::dropIfExists('system_payment_configs');
    }
}
