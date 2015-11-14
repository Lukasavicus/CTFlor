<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('activities', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->date('start');
            $table->time('startTime');
            $table->date('end');
            $table->time('endTime');
            $table->string('location');
            $table->integer('qnt_participants');
            $table->enum('type', ['lecture', 'mini_course', 'technical_visit']);
            $table->integer('id_event')->unsigned();
            $table->timestamps();
            $table->foreign('id_event')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('activities');
    }
}
