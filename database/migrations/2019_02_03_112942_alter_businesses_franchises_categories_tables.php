<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBusinessesFranchisesCategoriesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->json('url');
            $table->integer('revenue')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('discount')->default(0);
            $table->tinyInteger('part')->default(1);
            $table->tinyInteger('part_amount')->nullable();
        });

        Schema::table('franchises', function (Blueprint $table) {
            $table->json('url');
            $table->integer('revenue')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('discount')->default(0);
        });

        Schema::table('franchise_categories', function (Blueprint $table) {
            $table->integer('parent_id')->nullable();
        });

        Schema::table('business_categories', function (Blueprint $table) {
            $table->integer('parent_id')->nullable();
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
            $table->dropColumn('url');
            $table->dropColumn('revenue');
            $table->dropColumn('weight');
            $table->dropColumn('discount');
            $table->dropColumn('part');
            $table->dropColumn('part_amount');
        });

        Schema::table('franchises', function (Blueprint $table) {
            $table->dropColumn('url');
            $table->dropColumn('revenue');
            $table->dropColumn('weight');
            $table->dropColumn('discount');
        });

        Schema::table('franchise_categories', function (Blueprint $table) {
            $table->drop('parent_id');
        });

        Schema::table('business_categories', function (Blueprint $table) {
            $table->drop('parent_id');
        });
    }
}
