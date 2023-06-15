<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   protected $model = BooK::class;
    public function definition(): array
    {
        return [
            'author'=> fake()->name,
            'title' => fake()->title,
            'description' => fake()->text,
            'cover_image_path'=>fake()->imageUrl(100,100),
            'cover_image'=>fake()->imageUrl(100,100)
        ];
    }
}
