<?php

namespace Database\Factories;

use App\Models\PostMedia;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostMediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostMedia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $postIds = \App\Models\Post::pluck('id')->toArray();
        return [
            'image' => $this->faker->imageUrl(),
            'video' => $this->faker->randomElement([$this->faker->imageUrl(), null]),
            'post_id' => $this->faker->randomElement($postIds),
        ];
    }
}
