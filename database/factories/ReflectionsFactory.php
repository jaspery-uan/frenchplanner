<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classroom;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\reflections>
 */
class ReflectionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'numberofrefs' => fake()->numberBetween(0,10),
            'nameofmedia' => fake()->realText(200),
            'classroom_id' => Classroom::inRandomOrder()->first()->id,
        ];
    }
}
