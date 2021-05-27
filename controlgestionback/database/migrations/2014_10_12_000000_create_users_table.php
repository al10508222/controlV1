<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('password')->nullable();
            $table->string('email')->nullable();
            $table->string('name');
            $table->string('last_name');
            $table->string('second_lastname')->nullable();
            /* PARA SABER QUE ES LA PRIMERA VEZ QUE ENTRA EL USUARIO */
            $table->boolean('is_first_time')->default(1);
            $table->boolean('has_two_fa')->default(0);
            
            /* GUARDA LA LLAVE 2FA */
            $table->longText('secret')->nullable();
            $table->boolean('has_totp_activated')->default(0);
            $table->boolean('is_active')->default(true);

            $table->integer('active')->nullable()->default('0');
            $table->unsignedBigInteger("profile_id");
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
