<?php

namespace Database\Factories;

use App\Models\PresidentAlert;
use Illuminate\Database\Eloquent\Factories\Factory;

class PresidentAlertsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'description' => $this->faker->paragraph(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
