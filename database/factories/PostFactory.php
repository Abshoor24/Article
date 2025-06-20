<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'author_id' => User::factory(), // otomatis membuat user baru di table users berdasarkan author_id   
            'category_id' => Category::factory(), // otomatis membuat category baru di table categories berdasarkan category_id
            'slug' => Str::slug(fake()->sentence()),
            'body' => fake()->paragraphs(2, true),
        ];
    }
}
