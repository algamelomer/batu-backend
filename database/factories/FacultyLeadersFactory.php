<?php

namespace Database\Factories;

use App\Models\FacultyLeaders;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacultyLeadersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = \App\Models\User::pluck('id')->toArray();
        $facultyIds = \App\Models\Faculty::pluck('id')->toArray();

        return [
            'name' => $this->faker->name,
            'image' => $this->faker->imageUrl(),
            'email' => $this->faker->email,
            'word' => $this->faker->sentence,
            'cv' => $this->faker->word . '.pdf',
            'position' => $this->faker->randomElement(['Dean', 'Vice Dean']),
            'category' => $this->faker->randomElement(['dean', 'vice']),
            'faculty_id' => $this->faker->randomElement($facultyIds),
            'user_id' => $this->faker->randomElement($userIds),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
