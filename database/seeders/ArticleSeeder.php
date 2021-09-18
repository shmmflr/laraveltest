<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;


class ArticleSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Article::truncate();
        Article::factory()->count(40)->create();
    }
}
