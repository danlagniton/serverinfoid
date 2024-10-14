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
            $table->id();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->longText('address');
            $table->string('email')->unique();
            $table->string('contact_number');
            $table->string('is_uas_employee');
            $table->string('company_name');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->string('is_active');
            $table->string('is_locked');
            $table->integer('failed_attempts');
            $table->unsignedBigInteger('role_id');
            $table->string('password');
            $table->timestamps();

            $table->foreign('department_id')
                ->references('id')
                ->on('department');

            $table->foreign('position_id')
                ->references('id')
                ->on('position');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles');
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
