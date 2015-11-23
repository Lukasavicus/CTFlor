<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBancaAvaliadora extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bancaAvaliadora', function (Blueprint $table) {
          //
          $table->increments('id');

          $table->integer('event_id')->unsigned()->nullable();
          $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

          $table->integer('professor1')->unsigned()->nullable();
          $table->foreign('professor1')->references('id')->on('participants')->onDelete('cascade');

          $table->integer('professor2')->unsigned()->nullable();
          $table->foreign('professor2')->references('id')->on('participants')->onDelete('cascade');

          $table->integer('professor3')->unsigned()->nullable();
          $table->foreign('professor3')->references('id')->on('participants')->onDelete('cascade');

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
        //
        Schema::drop('bancaAvaliadora');
    }
}
