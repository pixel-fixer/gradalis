<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterInvitationsInvitationCounterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropColumn('ip');
            $table->dropColumn('http_referrer');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('invitation_counter', function (Blueprint $table) {
            $table->tinyInteger('status')->default(0)->after('id');
            $table->ipAddress('ip')->nullable()->after('status');
            $table->text('http_referrer')->nullable()->after('status');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('token', 16);
            $table->integer('count')->default(1);
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
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
            $table->ipAddress('ip')->nullable()->after('status');
            $table->text('http_referrer')->nullable()->after('status');
            $table->integer('user_id')->unsigned()->nullable();
        });

        Schema::table('invitation_counter', function (Blueprint $table) {
            $table->dropColumn('ip');
            $table->dropColumn('http_referrer');
            $table->dropColumn('status');
            $table->dropColumn('token');
            $table->dropColumn('count');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
