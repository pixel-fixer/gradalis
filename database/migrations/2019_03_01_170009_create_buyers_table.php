<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuyersTable extends Migration {

	public function up()
	{
		Schema::create('buyers', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('target_id')->unsigned();
            $table->string('target_type');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::drop('buyers');
	}
}
