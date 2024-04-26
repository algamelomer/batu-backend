<?php

namespace Database\Factories;

use App\Models\SocialLinks;
use Illuminate\Database\Eloquent\Factories\Factory;

class SocialLinksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = \App\Models\User::pluck('id')->toArray();

        return [
            'name' => $this->faker->randomElement(['Facebook', 'Instagram', 'X', 'LinkedIN', 'GitHub']),
            'image' => $this->faker->imageUrl(),
            'link' => $this->faker->url(),
            'user_id' => $this->faker->randomElement($userIds),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
