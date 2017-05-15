<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Papermodi extends Migration
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
            $table->string('useremail');
            $table->dateTime('deadline');
            $table->integer('noofessaytype');
            $table->integer('noofmcqtype');
            $table->string('subject');
            $table->string('levelofhardness');
            $table->string('section');

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
        Schema::drop('papers');////
    }
}
