<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('travel_id')->unsigned();
            $table->foreign('travel_id')->references('id')->on('travels');
            $table->datetime('out_time');
            $table->datetime('in_time');
            $table->string('out_city');
            $table->string('in_city');
            $table->string('aeroport');
            $table->string('meeting_person')->nullable();
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
        Schema::dropIfExists('flights');
    }
}
