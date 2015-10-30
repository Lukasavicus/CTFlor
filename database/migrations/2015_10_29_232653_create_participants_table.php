<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('participants', function(Blueprint $table){
            
            $table->increments('id');
            $table->string('name');
            $table->string('cpf')->unique();
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('password');
            $table->enum('type', ['student', 'professor', 'community', 'organization']);
            $table->string('university')->nullable(); //only valid to student and professor
            $table->string('course')->nullable(); //only valid to student
            $table->string('department')->nullable();
            $table->string('responsability')->nullable();
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
        Schema::drop('participants');
    }
}
