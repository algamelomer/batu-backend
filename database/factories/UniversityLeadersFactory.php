<?php

namespace Database\Factories;

use App\Models\UniversityLeader;
use Illuminate\Database\Eloquent\Factories\Factory;

class UniversityLeadersFactory extends Factory
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
            'word' => $this->faker->word(),
            'email' => $this->faker->safeEmail(),
            'cv' => $this->faker->word(),
            'position' => $this->faker->randomElement(['President', 'Vice_President']),
            'user_id' => $this->faker->randomElement($userIds),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
