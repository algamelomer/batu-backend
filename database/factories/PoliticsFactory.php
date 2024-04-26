<?php

namespace Database\Factories;

use App\Models\Politics;
use Illuminate\Database\Eloquent\Factories\Factory;

class PoliticsFactory extends Factory
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
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'user_id' => $this->faker->randomElement($userIds),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
