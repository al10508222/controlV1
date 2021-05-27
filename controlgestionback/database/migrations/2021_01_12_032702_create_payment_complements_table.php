<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentComplementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_complements', function (Blueprint $table) {
            $table->id();
            /* This  part is the UUID of the invoice */
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('xml_file_id');
            $table->unsignedBigInteger('pdf_file_id');
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
        Schema::dropIfExists('payment_complements');
    }
}
