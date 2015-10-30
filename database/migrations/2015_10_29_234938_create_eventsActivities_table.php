<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('eventsActivities', function(Blueprint $table){
            $table->integer('id_event')->unsigned();
            $table->integer('id_activity')->unsigned();
            $table->primary( ['id_event', 'id_activity'] );
            $table->foreign('id_event')->references('id')->on('events');
            $table->foreign('id_activity')->references('id')->on('activities');
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
        Schema::drop('eventsActivities');
    }
}
