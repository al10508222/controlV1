<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomPivotOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_pivot_options', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('cat_custom_field_id');
            $table->timestamps();

            $table->foreign('cat_custom_field_id')
                ->references('id')
                ->on('cat_custom_fields')
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
        Schema::dropIfExists('custom_pivot_options');
    }
}
