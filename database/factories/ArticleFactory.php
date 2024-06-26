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
            'slug' => str_replace(' ', '-', strtolower($this->faker->sentence(4))),
            'body' => $this->faker->paragraph,
            'user_id' => rand(1, 10),
            'category_id' => rand(1, 10)
        ];
    }
}
