<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_manager', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->jsonb('model');
            $table->jsonb('payload');
            $table->unsignedBigInteger('cat_module_id');
            $table->unsignedBigInteger('user_profile_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cat_type_employee_id')->nullable();
            $table->timestamps();

            $table->foreign('cat_module_id')
                ->references('id')
                ->on('cat_modules');

                $table->foreign('user_profile_id')
                ->references('id')
                ->on('user_profiles');

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
        Schema::dropIfExists('report_manager');
    }
}
