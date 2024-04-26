<?php

namespace Database\Factories;

use App\Models\ApplyStaff;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplyStaffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApplyStaff::class;

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
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'category' => $this->faker->randomElement(['administrative', 'teaching_staff', 'other']),
            'user_id' => $this->faker->randomElement($userIds),
        ];
    }
}
