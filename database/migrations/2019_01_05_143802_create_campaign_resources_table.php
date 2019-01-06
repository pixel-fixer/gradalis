<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignResourcesTable extends Migration {

	public function up()
	{
		Schema::create('campaign_resources', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('campaign_id')->unsigned();
			$table->json('name');
			$table->json('url');
			$table->integer('width')->nullable();
			$table->integer('height')->nullable();
			$table->tinyInteger('type')->default('1');
			$table->timestamps();

            $table->foreign('campaign_id')->references('id')->on('campaigns')
                ->onDelete('no action')
                ->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::drop('campaign_resources');
	}
}
