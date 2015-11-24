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
            $table->integer('id_package');
            $table->integer('id_activity');
            $table->primary(['id_package', 'id_activity']);
            $table->foreign('id_package')->references('id')->on('packages')->onDelete('cascade');
            $table->foreign('id_activity')->references('id')->on('activities')->onDelete('cascade');
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
