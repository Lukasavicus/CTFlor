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
            $table->date('end');
            $table->string('location');
            $table->integer('qnt_participants');
            $table->time('duration');
            $table->enum('type', ['lecture', 'mini_course', 'technical_visit']);
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
        Schema::drop('activities');
    }
}
