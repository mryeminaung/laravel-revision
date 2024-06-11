<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::truncate();
        Article::truncate();
        Comment::truncate();
        User::truncate();

        Article::factory(40)->create();
        Comment::factory(100)->create();
        User::factory(10)->create();

        $tags = [
            'Politics', 'Business', 'World', 'Science', 'Health', 'Education',
            'Entertainment', 'Sports', 'Weather', 'Crime'
        ];

        foreach ($tags as $tag) {
            Category::create(['name' => $tag]);
        }
    }
}
