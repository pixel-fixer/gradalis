<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('view_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->dateTime('view_at');
            $table->morphs('object');
            $table->enum('status', ['new', 'rejected', 'accepted'])->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_requests');
    }
}
