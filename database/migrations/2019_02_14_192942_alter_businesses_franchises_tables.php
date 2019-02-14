<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBusinessesFranchisesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->integer('show_count')->default(0);
        });

        Schema::table('franchises', function (Blueprint $table) {
            $table->integer('show_count')->default(0);
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
            $table->dropColumn('show_count')->change();
        });

        Schema::table('franchises', function (Blueprint $table) {
            $table->dropColumn('show_count')->change();
        });
    }
}
