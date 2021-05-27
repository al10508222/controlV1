<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_payment_status_id')->default(1); // Default CREATED
            $table->unsignedBigInteger('payment_order_id')->nullable();
            $table->string('folio');
            $table->unsignedBigInteger('service_month');
            $table->unsignedBigInteger('service_year');
            $table->unsignedBigInteger('absenses')->nullable();
            $table->unsignedBigInteger('brute_amount');
            $table->unsignedBigInteger('iva_amount');
            $table->unsignedBigInteger('subtotal');
            $table->unsignedBigInteger('iva_retention');
            $table->unsignedBigInteger('isr_retention');
            $table->unsignedBigInteger('total_amount');
            $table->unsignedBigInteger('minus')->nullable();
            $table->unsignedBigInteger('pay_amount');
            $table->unsignedBigInteger('payment_day')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            /* this field is to validate if the payment has activities registered in an easy way */
            $table->boolean('has_activities')->default(0);
            $table->date('confirm_date');
            $table->unsignedBigInteger('contract_id');
            $table->unsignedBigInteger('employee_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('cat_payment_status_id')
            ->references('id')
            ->on('cat_payment_statuses');

            $table->foreign('contract_id')
            ->references('id')
            ->on('contracts')
            ->onDelete('cascade');

            $table->foreign('employee_id')
            ->references('id')
            ->on('employees')
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
        Schema::dropIfExists('payments');
    }
}
