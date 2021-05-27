<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique()->nullable();
            $table->string('lastname');
            $table->string('email')->nullable();
            $table->string('second_lastname')->nullable();
            $table->string('rfc')->unique();
            $table->string('curp')->unique()->nullable();
            $table->string('nss')->nullable(); // Número de Seguridad Social
            $table->longText('semblance')->nullable();
            $table->unsignedBigInteger('cat_gender_id')->nullable();
            $table->unsignedBigInteger('cat_country_id')->nullable();
            $table->unsignedBigInteger('cat_state_id')->nullable();
            $table->unsignedBigInteger('cat_marital_status_id')->nullable();
            $table->unsignedBigInteger('cat_educational_level_id')->nullable();
            $table->json('skills')->nullable();
            $table->string('telephone')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('emergency_telephone')->nullable();
            $table->date('birthdate')->nullable();
            $table->boolean('is_first_time')->default(1);
            $table->unsignedBigInteger('type_employee')->default(1);
            $table->boolean('massive_loaded')->default(0);
            $table->boolean('is_active')->default(1);
            $table->boolean('is_dead')->default(0);
            /* ESTATUS PARA SABER SI ESTA EN PREREGISTRO 1= PREREGISTRADO 2= REGISTRADO */
            $table->unsignedBigInteger('cat_employee_status_id')->default(1);
            $table->unsignedBigInteger('file_id')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
