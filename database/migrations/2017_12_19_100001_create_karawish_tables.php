<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('songs', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->increments('id');

            $table->string("title");
            $table->string("artist");

            $table->string("opnotes");
        });


        Schema::create('playlist', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->increments('id');

            $table->integer('song_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('song_id')->references('id')->on('songs');
            $table->foreign('user_id')->references('id')->on('users');
        });


        Schema::create('users', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->increments('id');

            $table->string("name");
        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
