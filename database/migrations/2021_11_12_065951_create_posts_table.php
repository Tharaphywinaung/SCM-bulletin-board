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
            $table->bigIncrements('id');
            $table->string('title',255);
            $table->string('description');
            $table->integer('status')->default(1);
            $table->integer('create_user_id');
            $table->foreign('create_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_user_id');
            $table->foreign('updated_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->integer('deleted_user_id')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
