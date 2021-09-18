<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{

    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('cat')->default('زیر هیچ گروهی دسته بندی نشده است');
            $table->string('img')->default('img/default.png');
            $table->integer('userId');
            $table->enum('status', ['publish', 'draft'])->default('draft');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
