<?php

namespace Database\Factories;

use App\Models\FacultyAgent;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacultyAgentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FacultyAgent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = \App\Models\User::pluck('id')->toArray();

        return [
            'title' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph,
            'category' => $this->faker->randomElement(['services', 'approach', 'header']),
            'user_id' => $this->faker->randomElement($userIds),
        ];
    }
}
