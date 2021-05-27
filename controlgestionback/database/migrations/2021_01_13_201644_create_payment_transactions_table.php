<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('comments')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cat_payment_statuses_id');
            $table->unsignedBigInteger('payment_id');
            $table->timestamps();

            $table->foreign('cat_payment_statuses_id')
                ->references('id')
                ->on('cat_payment_statuses');

            $table->foreign('payment_id')
            ->references('id')
            ->on('payments')
            ->onDelete('cascade');    
            

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_transactions');
    }
}
