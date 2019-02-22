<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPartnersApaIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->integer('apa_id')->unsigned()->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('hold')->default(0);

            $table->foreign('apa_id')->references('id')->on('users')
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
        Schema::table('partners', function (Blueprint $table) {
            $table->dropForeign('partners_apa_id_foreign');

            $table->dropColumn('apa_id');
            $table->dropColumn('status');
            $table->dropColumn('hold');
        });
    }
}
