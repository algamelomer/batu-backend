<?php

namespace Database\Factories;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacultyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = \App\Models\User::pluck('id')->toArray();

        return [
            'name' => $this->faker->randomElement(['Health Science Technology', 'Industry and Energy College']),
            'description' => $this->faker->paragraph,
            'description_video' => $this->faker->url,
            'image' => $this->faker->imageUrl(),
            'logo' => $this->faker->imageUrl(),
            'video' => $this->faker->url,
            'vision' => $this->faker->paragraph,
            'mission' => $this->faker->paragraph,
            'user_id' => $this->faker->randomElement($userIds),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
