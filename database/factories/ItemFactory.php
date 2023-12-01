<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $complated = $this->faker->boolean();
        return [
            "name" => $this->faker->name(),
            "completed" => $complated,
            "completed_at" => $complated ? $this->faker->dateTimeThisDecade() : NULL
        ];
    }
}