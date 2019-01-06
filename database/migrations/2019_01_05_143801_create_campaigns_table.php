<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignsTable extends Migration {

	public function up()
	{
		Schema::create('campaigns', function(Blueprint $table) {
			$table->increments('id');
			$table->json('name');
			$table->integer('target_id');
			$table->tinyInteger('type');
			$table->tinyInteger('status')->default('0');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('campaigns');
	}
}
