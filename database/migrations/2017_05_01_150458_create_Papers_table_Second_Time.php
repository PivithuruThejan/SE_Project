<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapersTableSecondTime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_email');
            $table->integer('deadline');
            $table->string('level');
            $table->integer('mcqno');
            $table->integer('essayno');
            $table->string('section');
            $table->string('subject');
            $table->string('receiver_email');
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('papers');//
    }
}
