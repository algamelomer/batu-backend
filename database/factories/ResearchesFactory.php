<?php

namespace Database\Factories;

use App\Models\Researches;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResearchesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $staffProgramsId = null;
        $staffMembersId = null;

        // Generate random number between 1 and 10
        $randomNumber = $this->faker->numberBetween(1, 10);

        // Randomly choose one of the ids to have a value
        if ($this->faker->boolean()) {
            $staffProgramsId = $randomNumber;
        } else {
            $staffMembersId = $randomNumber;
        }
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'user_id' => \App\Models\User::factory(),
            'staff_programs_id' => $staffProgramsId,
            'staff_members_id' => $staffMembersId,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
