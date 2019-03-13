<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCallCountToObjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->addColumn('integer', 'calls_count')->after('show_count')->default(0);
        });

        Schema::table('franchises', function (Blueprint $table) {
            $table->addColumn('integer', 'calls_count')->after('show_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->dropColumn('calls_count');
        });

        Schema::table('franchises', function (Blueprint $table) {
            $table->dropColumn('calls_count');
        });
    }
}
