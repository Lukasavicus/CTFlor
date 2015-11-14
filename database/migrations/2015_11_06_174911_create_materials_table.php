<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_activity')->unsigned();
            $table->integer('id_participant')->unsigned();
            $table->foreign('id_activity')->references('id')->on('activities')->onDelete('cascade');
            $table->foreign('id_participant')->references('id')->on('participants')->onDelete('cascade');
            $table->string('title');
            $table->string('keywords');
            $table->string('resumo');
            $table->string('abstract');
            $table->string('categoria');
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
        Schema::drop('materials');
    }
}
