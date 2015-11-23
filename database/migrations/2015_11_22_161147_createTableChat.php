<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            //
            $table->increments('id');

            $table->integer('userParticipant')->unsigned()->nullable();
            $table->foreign('userParticipant')->references('id')->on('participants')->onDelete('cascade');

            $table->integer('userBanca')->unsigned()->nullable();
            $table->foreign('userBanca')->references('id')->on('participants')->onDelete('cascade');

            $table->boolean('userParticipant_is_typing')->default(false);
            $table->boolean('userBanca_is_typing')->default(false);
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
        Schema::drop('chat');
    }
}
