<?php

namespace Database\Factories;

use App\Models\StaffPrograms;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaffProgramsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StaffPrograms::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = \App\Models\User::pluck('id')->toArray();
        $departmentIds = \App\Models\Department::pluck('id')->toArray();

        return [
            'name' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(),
            'word' => $this->faker->word(),
            'position' => $this->faker->randomElement(['Head of Department', 'Coordinator', 'Assistant']),
            'email' => $this->faker->safeEmail(),
            'cv' => $this->faker->word(),
            'user_id' => $this->faker->randomElement($userIds),
            'department_id' => $this->faker->randomElement($departmentIds),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
