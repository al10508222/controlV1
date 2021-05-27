<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHiringMemoDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hiring_memo_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hiring_memo_id');
            $table->unsignedBigInteger('file_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('hiring_memo_id')
            ->references('id')
            ->on('hiring_memos')
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
        Schema::dropIfExists('hiring_memo_documents');
    }
}
