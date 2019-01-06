<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvitationsTable extends Migration {

	public function up()
	{
		Schema::create('invitations', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('partner_id')->unsigned();
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('campaign_id')->unsigned();
			$table->integer('campaign_resource_id')->unsigned();
            $table->string('token', 16)->unique();
			$table->tinyInteger('status')->default('0');
			$table->timestamps();

            $table->foreign('partner_id')->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('campaign_id')->references('id')->on('campaigns')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('campaign_resource_id')->references('id')->on('campaign_resources')
                ->onDelete('no action')
                ->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::drop('invitations');
	}
}
