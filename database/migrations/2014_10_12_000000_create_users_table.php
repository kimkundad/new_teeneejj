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
      Schema::dropIfExists('users');
      Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('first_name')->nullable();
          $table->string('last_name')->nullable();
          $table->string('email')->unique();
          $table->string('password')->nullable();
          $table->boolean('is_admin')->nullable();
          $table->string('provider')->nullable();
          $table->string('avatar')->nullable();
          $table->string('phone')->nullable();
          $table->text('bio')->nullable();
          $table->integer('user_lock')->nullable();
          $table->integer('vote_status')->default('0');
          $table->string('url_image')->nullable();
          $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
