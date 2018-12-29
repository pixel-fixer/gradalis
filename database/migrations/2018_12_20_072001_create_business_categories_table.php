<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusinessCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('business_categories', function(Blueprint $table) {
			$table->increments('id');
            $table->json('name');
            $table->json('translations');
            $table->softDeletes();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('business_categories');
	}
}
