<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCategoryTable extends Migration
{

    public function up()
    {
        Schema::create('article_category', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id')->references('id')
                ->on('articles')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')
                ->on('categories')->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_category');
    }
}
