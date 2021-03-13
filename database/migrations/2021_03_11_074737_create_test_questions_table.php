<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('test_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question_en');
            $table->string('question_ru');
            $table->unsignedTinyInteger('correct_answer');
        });
    }

    public function down()
    {
        Schema::dropIfExists('test_questions');
    }
}
