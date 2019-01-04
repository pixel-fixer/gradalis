<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFranchiseCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('franchise_categories', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->json('translation');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('franchise_categories');
	}
}
