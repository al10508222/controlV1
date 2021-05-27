<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConceptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concepts', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->integer('taxable_type')->nullable();
            $table->decimal('condition_total', 7, 2)->nullable();
            $table->unsignedBigInteger('cat_yearly_variable_type_id')->nullable();
            $table->unsignedBigInteger('cat_concept_type_id');
            $table->unsignedBigInteger('cat_concept_calculation_type_id');
            $table->unsignedBigInteger('cat_periodicity_type_id')->nullable();
            $table->date('extraordinary_date')->nullable();
            $table->unsignedBigInteger('cat_sat_concept_id')->nullable();
            $table->unsignedBigInteger('cat_specific_budget_item_id')->nullable();
            $table->string('observation')->nullable();
            $table->boolean('has_validity');
            $table->boolean('is_pantry_voucher')->default(false);
            $table->date('validity_start_date')->nullable();
            $table->date('validity_end_date')->nullable();
            $table->boolean('is_global_automatic');
            $table->boolean('is_settlement_automatic');
            $table->boolean('should_print');
            $table->bigInteger('fixed_amount')->nullable();
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('concepts');
    }
}
