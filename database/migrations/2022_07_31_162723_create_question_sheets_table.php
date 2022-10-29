<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionSheetsTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('question_sheets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code');
            $table->string('title');
            $table->string('description');
            $table->string('status');
            $table->string('allowed_time');
            $table->string('created_by');
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
        Schema::dropIfExists('question_sheets');
    }
}
