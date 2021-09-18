<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('sort');
            $table->integer('parent');
            $table->enum('status', ['on', 'off']);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
