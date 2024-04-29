<?php

namespace Database\Factories;

use App\Models\LeaderCouncil;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeaderCouncilFactory extends Factory
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
            'name' => $this->faker->name(),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph(),
            'position' => $this->faker->randomElement(['President', 'Vice President', 'Secretary', 'Treasurer']),
            'user_id' => $this->faker->randomElement($userIds),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
