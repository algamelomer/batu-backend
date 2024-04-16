<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AboutUniversityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ["history", "vision", "mission", "policies", "contracts", "governing_council", "header", "UniversityInfo"];

        return [
            'title' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            'video' => $this->faker->imageUrl(),
            'description_video' => $this->faker->paragraph,
            'description' => $this->faker->paragraph,
            'type' => $this->faker->randomElement($types),
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
