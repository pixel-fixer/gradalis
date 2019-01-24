<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServicesTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('slug', 255)->nullable()->after('status');
            $table->string( 'icon', 255)->nullable()->after('slug');
            $table->json( 'small_text')->nullable()->after('name');
            $table->json( 'price_for')->nullable()->after('price_eur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['slug', 'icon', 'small_text', 'price_for']);
        });
    }
}
