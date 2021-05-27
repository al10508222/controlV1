<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateCatBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_bank_id')->nullable();
            $table->unsignedBigInteger('cat_bank_account_type_id');
            $table->string('name');
            $table->string('clabe')->nullable();
            $table->string('account')->nullable();
            $table->boolean('isActive')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_bank_accounts');
    }
}
