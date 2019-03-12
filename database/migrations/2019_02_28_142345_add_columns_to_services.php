<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('banner')->after('price_for')->nullable();
            $table->json('promo_video')->after('banner')->nullable();
            $table->text('preview_text')->after('promo_video')->nullable();
            $table->string('preview_image')->after('preview_text')->nullable();
            $table->text('detail_text')->after('preview_text')->nullable();
    
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
            $table->dropColumn('banner');
            $table->dropColumn('promo_video');
            $table->dropColumn('detail_text');    
            $table->dropColumn('preview_text');    
            $table->dropColumn('preview_image');    
        });
    }
}
