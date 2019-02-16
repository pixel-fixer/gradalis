<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaeCampaignTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_targets', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('campaign_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->string('cpl')->nullable();
            $table->string('cps')->nullable();
            $table->timestamps();

            $table->foreign('campaign_id')->references('id')->on('campaigns')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('country_id')->references('id')->on('countries')
                ->onDelete('no action')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campaign_targets');
    }
}
