<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFranchisePackagesTable extends Migration {

	public function up()
	{
		Schema::create('franchise_packages', function(Blueprint $table) {
			$table->increments('id');
            $table->json('options');
            $table->json('name');
			$table->integer('franchise_id')->unsigned();
			$table->bigInteger('price');
			$table->tinyInteger('profitability');
			$table->bigInteger('lump');
			$table->bigInteger('investments');
			$table->bigInteger('roality');
			$table->bigInteger('marketing_fee');
			$table->bigInteger('profit');
			$table->tinyInteger('payback');
			$table->timestamps();

            $table->foreign('franchise_id')->references('id')->on('franchises')
                ->onDelete('cascade')
                ->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::drop('franchise_packages');
	}
}
