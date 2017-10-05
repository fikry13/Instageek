<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFolloweesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followees', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('followee_id');
            $table->timestamps();

            $table->primary(['user_id','followee_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followees');
    }
}
