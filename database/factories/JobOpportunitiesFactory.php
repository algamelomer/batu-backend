<?php

namespace Database\Factories;

use App\Models\JobOpportunities;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobOpportunitiesFactory extends Factory
{
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
            'title' => $this->faker->jobTitle(),
            'link' => $this->faker->url(),
            'user_id' => $this->faker->randomElement($userIds),
            'department_id' => $this->faker->randomElement($departmentIds),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
