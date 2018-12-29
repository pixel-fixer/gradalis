<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusinessesTable extends Migration {

	public function up()
	{
		Schema::create('businesses', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
            $table->json('name');
            $table->json('description');
            $table->json('seo_title')->nullable();
            $table->json('seo_description')->nullable();
            $table->json('seo_keywords')->nullable();
			$table->bigInteger('price');
			$table->tinyInteger('profitability');
			$table->integer('profit');
			$table->tinyInteger('payback');
			$table->tinyInteger('status')->default('0');
			$table->integer('district_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->timestamps();
            $table->softDeletes();

            $table->foreign('district_id')->references('id')->on('districts')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('city_id')->references('id')->on('cities')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('business_categories')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

		});
	}

	public function down()
	{
		Schema::drop('businesses');
	}
}
