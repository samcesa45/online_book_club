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
            'author'=> $this->faker->name,
            'title' => $this->faker->title,
            'description' => $this->faker->text,
            'cover_image_path'=>$this->faker->imageUrl(100,100)
        ];
    }
}
