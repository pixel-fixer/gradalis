<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterInvitationSubAccountColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->json('sub_account')->nullable();
        });
        Schema::table('campaign_targets', function(Blueprint $table) {
            $table->integer('cpl')->change();
            $table->integer('cps')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropColumn('sub_account');
        });
        Schema::table('campaign_targets', function(Blueprint $table) {
            $table->string('cpl')->change();
            $table->string('cps')->change();
        });
    }
}
