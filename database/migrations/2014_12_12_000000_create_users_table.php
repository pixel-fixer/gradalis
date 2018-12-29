<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->unsigned()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('balance')->unsigned()->default(0);
            $table->string('password');
            $table->tinyInteger('active')->default(1)->unsigned();

            $table->integer('sum_from')->unsigned()->default(0);
            $table->integer('sum_to')->unsigned()->default(0);
            $table->dateTime('purchase_date_from')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('purchase_date_to')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities')
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
        Schema::dropIfExists('users');
    }
}
