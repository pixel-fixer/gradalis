<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFranchisesTable extends Migration {

	public function up()
	{
		Schema::create('franchises', function(Blueprint $table) {
			$table->increments('id');
            $table->json('name');
            $table->json('description');
            $table->json('seo_title')->nullable();
            $table->json('seo_description')->nullable();
            $table->json('seo_keywords')->nullable();
            $table->json('education')->nullable();
			$table->integer('price');
			$table->tinyInteger('profitability');
			$table->integer('profit');
			$table->tinyInteger('status')->default('0');
			$table->integer('district_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->bigInteger('roality');
			$table->integer('foundation_year');
			$table->integer('start_year');
			$table->integer('own_enterprices');
			$table->timestamps();

            $table->foreign('category_id')->references('id')->on('franchise_categories')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('district_id')->references('id')->on('districts')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('city_id')->references('id')->on('cities')
                ->onDelete('no action')
                ->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::drop('franchises');
	}
}
