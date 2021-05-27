<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_module_id')->nullable();
            $table->string('name');
            $table->string('observations')->nullable();
            $table->boolean('is_required')->default(0);
            $table->boolean('is_visible')->default(0);

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('cat_module_id')
            ->references('id')
            ->on('cat_modules')
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
        Schema::dropIfExists('cat_documents');
    }
}
