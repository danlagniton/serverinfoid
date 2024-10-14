<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmittedFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submitted_forms', function (Blueprint $table) {
            $table->id();
            $table->string('form_name');
            $table->unsignedBigInteger('template_id');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('appointment_schedule');
            $table->string('status');
            $table->timestamp('approval_date')->nullable(true);
            $table->timestamps();

            $table->foreign('template_id')
                ->references('id')
                ->on('templates');
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
        Schema::dropIfExists('submitted_forms');
    }
}
