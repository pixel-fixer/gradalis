<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->json('title');
            $table->json('description');
            $table->json('video')->nullable();
            $table->json('seo_description')->nullable();
            $table->json('seo_title')->nullable();
            $table->json('seo_keywords')->nullable();
            $table->json('vk')->nullable();
            $table->json('ok')->nullable();
            $table->json('google')->nullable();
            $table->json('mail')->nullable();
            $table->json('fb')->nullable();
            $table->json('url')->nullable();
            $table->integer('view')->unsigned()->default(0);
            $table->integer('status')->default(0);
            $table->integer('category_id')->unsigned();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('news_category')
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
        Schema::dropIfExists('news');
    }
}
