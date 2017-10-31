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
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('name')->nullable();
            $table->text('bio')->nullable();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->enum('sex', ['M', 'F', 'O'])->nullable();
            $table->string('profile_picture')->nullable();
            $table->unsignedInteger('post_count')->default(0);
            $table->unsignedInteger('follower_count')->default(0);
            $table->unsignedInteger('followee_count')->default(0);
            $table->rememberToken();
            $table->string('password');
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
