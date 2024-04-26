<?php

namespace Database\Factories;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'description' => $this->faker->paragraph,
            'category' => $this->faker->randomElement(['Complaint', 'Question', 'Proposal']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
