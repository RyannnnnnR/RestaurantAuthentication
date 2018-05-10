<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplementaryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('countries', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->timestamps();
      });
      Schema::create('roles', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->timestamps();
      });
      Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('email')->unique();
          $table->string('password');
          $table->rememberToken();
          $table->timestamps();
      });
      Schema::create('posts', function (Blueprint $table) {
          $table->increments('id');
          $table->string('content');
          $table->timestamps();
      });
      Schema::create('comments', function (Blueprint $table) {
          $table->increments('id');
          $table->string('content');
          $table->timestamps();
      });
      Schema::create('role_user', function (Blueprint $table) {
          $table->integer('user_id')->unsigned();
          $table->integer('role_id')->unsigned();
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
      Schema::dropIfExists('countries');
      Schema::dropIfExists('users');
      Schema::dropIfExists('posts');
      Schema::dropIfExists('comments');
      Schema::dropIfExists('roles');
      Schema::dropIfExists('role_user');
    }
}
