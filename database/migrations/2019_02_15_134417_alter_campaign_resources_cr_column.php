<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCampaignResourcesCrColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_resources', function (Blueprint $table) {
            $table->integer('cr')->nullable();
            $table->integer('resource_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaign_resources', function (Blueprint $table) {
            $table->dropColumn('cr');
            $table->dropColumn('resource_type');
        });
    }
}
