<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConditionsTable extends Migration {

	public function up()
	{
		Schema::create('conditions', function(Blueprint $table) {
			$table->increments('id');
			$table->json('name');
			$table->json('description')->nullable();
			$table->timestamps();

		});
	}

	public function down()
	{
		Schema::drop('conditions');
	}
}
