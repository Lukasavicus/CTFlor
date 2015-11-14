<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('activitiesParticipants', function(Blueprint $table){
            $table->integer('id_activity')->unsigned();
            $table->integer('id_participant')->unsigned();
            $table->enum('role_participant', ['listener', 'speaker', 'judge']);
            $table->primary(['id_activity', 'id_participant']);
            $table->foreign('id_activity')->references('id')->on('activities')->onDelete('cascade');
            $table->foreign('id_participant')->references('id')->on('participants')->onDelete('cascade');
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
        Schema::drop('activitiesParticipants');
    }
}
