<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence, //Generates a fake sentence
            'description' => $this->faker->sentence,
            'slug' => $this->faker->slug(),
            'imagePath' => $this->faker->imageUrl(),
            'category_id' => $this->faker->randomElement(Category::pluck('id')),
            'body' => $this->faker->paragraph(30), //Generates a fake paragraph with 30 sentences
            'user_id' => $this->faker->randomElement(User::pluck('id')), //Generates a random user id
        ];
    }
}
