<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_employment_type_id');
            $table->unsignedBigInteger('cat_contract_type_id')->nullable();
            $table->unsignedBigInteger('cat_unit_id')->nullable();
            $table->unsignedBigInteger('cat_employment_location_id')->nullable();
            $table->unsignedBigInteger('cat_off_work_reason_id')->nullable();
            $table->unsignedBigInteger('cat_employment_client_id')->nullable();
            $table->string('observation')->nullable();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->boolean('has_kit')->default(0);
            $table->boolean('is_active')->default(false);
            $table->date('date')->nullable();
            $table->boolean('massive_loaded')->default(0);

            $table->foreign('cat_employment_type_id')->references('id')->on('cat_employment_types');
            $table->foreign('cat_contract_type_id')->references('id')->on('cat_contract_types');
            $table->foreign('cat_unit_id')->references('id')->on('cat_units');
            $table->foreign('cat_employment_location_id')->references('id')->on('cat_employment_locations');
            $table->foreign('cat_employment_client_id')->references('id')->on('cat_employment_clients');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->softDeletes();
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
        Schema::dropIfExists('employments');
    }
}
