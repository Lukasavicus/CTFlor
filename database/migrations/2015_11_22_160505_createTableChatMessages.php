<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChatMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatMessages', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('sender_username')->unsigned()->nullable();
            $table->foreign('sender_username')->references('id')->on('participants')->onDelete('cascade');
            $table->text('message');
            $table->boolean('read')->default(false);
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
        Schema::drop('chatMessages');
    }
}
