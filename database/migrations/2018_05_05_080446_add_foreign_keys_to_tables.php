<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      schema::table('restaurants', function (Blueprint $table) {
        $table->integer('country_id');
        $table->integer('user_id');
      });
      schema::table('posts', function (Blueprint $table) {
        $table->integer('restaurant_id');
        $table->integer('user_id');
      });
      schema::table('comments', function (Blueprint $table) {
        $table->integer('post_id');
        $table->integer('user_id');
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
