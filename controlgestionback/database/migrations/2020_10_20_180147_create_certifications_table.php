<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_certifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string("entity");
            $table->string("name");
            $table->string("description")->nullable();
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->boolean('expires')->nullable();
            $table->string("credential_id")->nullable();
            $table->string("url")->nullable();
            $table->unsignedBigInteger('file_id')->nullable();
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
        Schema::dropIfExists('employee_certifications');
    }
}
