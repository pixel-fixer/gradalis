<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvitationCounterTable extends Migration {

	public function up()
	{
		Schema::create('invitation_counter', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('invitation_id')->unsigned();
			$table->timestamps();

            $table->foreign('invitation_id')->references('id')->on('invitations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::drop('invitation_counter');
	}
}
