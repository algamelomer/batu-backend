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
        $userIds = \App\Models\User::pluck('id')->toArray();

        return [
            'title' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(),
            'video' => $this->faker->randomElement([$this->faker->imageUrl(), null]),
            'description_video' => $this->faker->paragraph(),
            'description' => $this->faker->paragraph(),
            'user_id' => $this->faker->randomElement($userIds),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
