<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{

    protected $model = Article::class;


    public function definition()
    {
        return [
            'title' => $this->faker->text($maxNbChars = 40),
            'content' => $this->faker->text($maxNbChars = 400),
            'img' => $this->faker->imageUrl($width = 580, $height = 360, 'sports'),
            'status' => 'publish',
            'userId' => '1'

        ];
    }
}
