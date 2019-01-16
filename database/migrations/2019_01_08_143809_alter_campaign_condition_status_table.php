<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterCampaignConditionStatusTable extends Migration {

	public function up()
	{
		Schema::table('campaign_condition', function(Blueprint $table) {
            $table->tinyInteger('status')->default(0);
		});
	}

	public function down()
	{
        Schema::table('campaign_condition', function (Blueprint $table) {
            $table->dropColumn('status');
        });
	}
}
