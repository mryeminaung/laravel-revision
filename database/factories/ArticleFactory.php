<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'article_img' => 'https://dummyimage.com/700x400/000/fff.png&text=Blog+Img',
            'slug' => str_replace(' ', '-', strtolower($this->faker->sentence(4))),
            'body' => $this->faker->paragraph(10),
            'user_id' => rand(1, 10),
            'category_id' => rand(1, 10)
        ];
    }
}
