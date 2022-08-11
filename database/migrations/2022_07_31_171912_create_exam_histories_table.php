<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_histories', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->unsignedBigInteger('qs_id');
            $table->unsignedBigInteger('student_id');
            $table->timestamps();
            $table->foreign('qs_id')->references('id')->on('question_sheets')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('student_id')->references('id')->on('students')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_histories');
    }
}
