<?php

namespace Database\Factories;

use App\Models\StaffMembers;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaffMembersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StaffMembers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = \App\Models\User::pluck('id')->toArray();
        $facultyIds = \App\Models\Faculty::pluck('id')->toArray();
        $departmentIds = \App\Models\Department::pluck('id')->toArray();

        return [
            'name' => $this->faker->name(),
            'image' => $this->faker->imageUrl(),
            'email' => $this->faker->safeEmail(),
            'description' => $this->faker->paragraph(),
            'cv' => $this->faker->word(),
            'position' => $this->faker->randomElement(['Professor', 'Assistant Professor', 'Lecturer']),
            'user_id' => $this->faker->randomElement($userIds),
            'faculty_id' => $this->faker->randomElement($facultyIds),
            'department_id' => $this->faker->randomElement($departmentIds),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
