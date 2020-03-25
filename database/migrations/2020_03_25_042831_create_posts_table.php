<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
//            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->unsignedBigInteger('user_id');
            $table->integer('category_id')->unsigned();
            $table->string('photo_path')->nullable();
            $table->string('title');
            $table->string('body');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
