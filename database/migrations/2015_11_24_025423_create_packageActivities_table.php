<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packagesActivities', function(Blueprint $table){
            $table->integer('id_package')->unsigned();
            $table->integer('id_activity')->unsigned();
            $table->primary(['id_package', 'id_activity']);
            $table->foreign('id_package')->references('id')->on('packages');
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
        Schema::drop('packagesActivities');
    }
}
