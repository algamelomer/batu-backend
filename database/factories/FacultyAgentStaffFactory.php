<?php

namespace Database\Factories;

use App\Models\FacultyAgentStaff;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacultyAgentStaffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FacultyAgentStaff::class;

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
            'word' => $this->faker->paragraph,
            'cv' => $this->faker->url,
            'position' => $this->faker->jobTitle,
            'faculty_id' => $this->faker->randomElement($facultyIds),
            'user_id' => $this->faker->randomElement($userIds),
        ];
    }
}
