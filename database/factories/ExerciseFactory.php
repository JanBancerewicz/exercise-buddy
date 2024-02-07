<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Exercise;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exercise>
 */
class ExerciseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(
                fake()->numberBetween(2,6)
            ),
            'content' => fake()->sentence(
                fake()->numberBetween(15,30)
            ),
            'status' => fake()->randomElement(
                Exercise::getAvailableStatuses()
            ),
            'category' => fake()->numberBetween(0,5),
            'weight' => fake()->randomElement([5, 8, 10, 12, 15, 17, 20]),
            'reps' => fake()->numberBetween(5,30),
            'sets' => fake()->numberBetween(1,4),
            'restTime' => fake()->randomElement([30, 60, 90, 120])
        ];

    }
}
