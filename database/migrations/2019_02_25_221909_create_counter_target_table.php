<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCounterTargetTable extends Migration {

	public function up()
	{
		Schema::create('counter_target', function(Blueprint $table) {
            $table->integer('counter_id')->unsigned();
            $table->integer('target_id')->unsigned();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('type')->default(1);
            $table->tinyInteger('sum')->default(0);

            $table->foreign('counter_id')->references('id')->on('invitation_counter')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('target_id')->references('id')->on('campaign_targets')
                ->onDelete('no action')
                ->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::drop('counter_target');
	}
}
