<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ObjectRequestsAddTravelIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('object_requests', function (Blueprint $table) {
            $table->string('travel_id')->nullable();
            $table->text('reject_reason')->nullable();
            $table->text('buyer_comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('object_requests', function (Blueprint $table) {
            $table->dropColumn('travel_id');
            $table->dropColumn('reject_reason');
            $table->dropColumn('buyer_comment');
        });
    }
}
