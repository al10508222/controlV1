<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserExternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_externals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->unsignedBigInteger('employee_id');
            $table->string('name');
            $table->string('lastname');
            $table->string('second_lastname')->nullable();
            /* PARA SABER QUE ES LA PRIMERA VEZ QUE ENTRA EL USUARIO */
            $table->boolean('is_first_time')->default(1);
            $table->integer('active')->nullable()->default('1');
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_externals');
    }
}
