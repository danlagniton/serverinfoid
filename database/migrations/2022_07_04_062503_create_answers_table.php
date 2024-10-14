<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('question'); // save whole question instead of id
            $table->string('answer');
            $table->boolean('is_sub_question');
            $table->longText('main_question')->nullable();
            $table->unsignedBigInteger('submitted_form_id');
            $table->timestamps();
            $table->foreign('submitted_form_id')
                ->references('id')
                ->on('submitted_forms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
