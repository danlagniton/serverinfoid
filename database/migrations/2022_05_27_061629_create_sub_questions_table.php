<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_questions', function (Blueprint $table) {
            $table->id();
            $table->longText('question');
            $table->string('field_type');
            $table->string('options')->nullable();
            $table->unsignedInteger('question_id');
            $table->unsignedInteger('template_id');
            $table->string('is_latest_version');
            $table->timestamps();
            // $table->foreign('template_id')
            //     ->references('id')
            //     ->on('templates')
            //     ->onDelete('cascade');
            // $table->foreign('question_id')
            //     ->references('id')
            //     ->on('questions')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_questions');
    }
}
