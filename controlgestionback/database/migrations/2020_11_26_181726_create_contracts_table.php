<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->date('startDate');
            $table->date('endDate');
            $table->date('anticipatedDate')->nullable();
            $table->date('startDelayedDate')->nullable();
            $table->unsignedBigInteger('totalAmout');
            $table->unsignedBigInteger('monthAmout');
            $table->string('contractNumber');
            $table->float('monthsDuration');
            $table->unsignedBigInteger('daysDuration');
            $table->unsignedBigInteger('dailyAmout');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('memo_id');
            $table->boolean('isActive');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('project_id')
            ->references('id')
            ->on('projects')
            ->onDelete('cascade');

            $table->foreign('employee_id')
            ->references('id')
            ->on('employees')
            ->onDelete('cascade');

            $table->foreign('memo_id')
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
        Schema::dropIfExists('contracts');
    }
}
