<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCampaignsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->string('type')->change();
            $table->integer('clt_days')->default(30);
            $table->integer('approve_days')->default(30);
            $table->integer('pay_days')->default(30);
            $table->integer('campaign_status')->default(1);
            $table->integer('country_id')->unsigned();
            $table->string('site');
            $table->json('description');

            $table->foreign('country_id')->references('id')->on('countries')
                ->onDelete('no action')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->integer('type')->change();
            $table->dropColumn('clt_days');
            $table->dropColumn('approve_days');
            $table->dropColumn('pay_days');
            $table->dropColumn('country_id');
            $table->dropColumn('description');
            $table->dropColumn('site');

            $table->dropForeign('country_id');
        });
    }
}
