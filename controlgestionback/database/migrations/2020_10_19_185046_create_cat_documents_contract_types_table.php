<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatDocumentsContractTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_documents_contract_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cat_document_id');
            $table->unsignedBigInteger('cat_contract_type_id');
            $table->foreign('cat_document_id')->references('id')->on('cat_documents');
            $table->foreign('cat_contract_type_id')->references('id')->on('cat_contract_types');
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
        Schema::dropIfExists('cat_documents_contract_types');
    }
}
