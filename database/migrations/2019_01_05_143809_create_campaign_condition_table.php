<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignConditionTable extends Migration {

	public function up()
	{
		Schema::create('campaign_condition', function(Blueprint $table) {
            $table->integer('campaign_id')->unsigned();
            $table->integer('condition_id')->unsigned();

            $table->foreign('campaign_id')->references('id')->on('campaigns')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('condition_id')->references('id')->on('conditions')
                ->onDelete('no action')
                ->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::drop('campaign_condition');
	}
}
