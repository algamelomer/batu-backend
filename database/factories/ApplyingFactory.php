<?php

namespace Database\Factories;

use App\Models\Applying;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplyingFactory extends Factory
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
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl,
            'category' => $this->faker->randomElement(['staff', 'student']),
            'user_id' => $this->faker->randomElement($userIds),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
