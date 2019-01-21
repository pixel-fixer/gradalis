<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBusinessesFranchisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->integer('call_count')->default(0);
            $table->json('price')->change();
            $table->decimal('percent');
            $table->text('metrics')->nullable();
        });

        Schema::table('franchises', function (Blueprint $table) {
            $table->integer('call_count')->default(0);
            $table->json('price')->change();
            $table->decimal('percent');
            $table->text('metrics')->nullable();
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
            $table->dropColumn('call_count');
            $table->dropColumn('percent');
            $table->dropColumn('metrics');
            $table->integer('price')->change();
        });

        Schema::table('franchises', function (Blueprint $table) {
            $table->dropColumn('call_count');
            $table->dropColumn('percent');
            $table->dropColumn('metrics');
            $table->integer('price')->change();
        });
    }
}
