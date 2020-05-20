<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->string('title');
            $table->text('short_content');
            $table->text('content');
            $table->string('image')->default('images/posts/noimage.png');
            $table->string('type');
            $table->enum('status',[0,1])->default(0);
            $table->timestamps();

            $table -> foreign('author_id')
                -> references('id')
                -> on('authors')
                -> onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
