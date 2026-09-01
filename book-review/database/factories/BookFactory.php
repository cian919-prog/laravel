<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => fake()->name,
            'created_at' => fake()->dateTimeBetween('1 year ago', 'now'),
            'updated_at' => fake()->dateTimeBetween('created_at', 'now')
        ];
    }
}
