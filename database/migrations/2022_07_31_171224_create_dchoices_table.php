<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDchoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dchoices', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->uuid('q_id')->nullable(false);
            $table->timestamps();
            $table->foreign('q_id')->references('id')->on('questions')
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
        Schema::dropIfExists('dchoices');
    }
}
