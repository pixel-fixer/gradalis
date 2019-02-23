<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->dateTime('view_at');
            $table->morphs('object');
            $table->enum('type', ['view', 'doc']);
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
        Schema::dropIfExists('object_requests');
    }
}
