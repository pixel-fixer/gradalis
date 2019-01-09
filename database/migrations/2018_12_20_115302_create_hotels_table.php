<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function(Blueprint $table) {
            $table->increments('id');
            $table->datetime('check_in_date');
            $table->datetime('check_out_date');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('url')->nullable();
            $table->integer('travel_id')->unsigned();
            $table->foreign('travel_id')->references('id')->on('travels');
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
        Schema::dropIfExists('hotels');
    }
}
