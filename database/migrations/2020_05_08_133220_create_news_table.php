<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('short_content');
            $table->string('content');
            $table->string('preview')->default('/upload/images/noImage.png');
            $table->string('author_name');
            $table->enum('status', [0, 1])->default(1);
            $table->string('type')->default('NewsPublication');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
}
