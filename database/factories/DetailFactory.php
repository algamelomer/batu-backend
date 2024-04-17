<?php

namespace Database\Factories;
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DetailFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $details = [
            [
                'title' => 'faculty',
                'description' => NULL,
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(1).svg',
                'counter_number' => 2,
                'category' => 'counter',
            ],
            [
                'title' => 'students',
                'description' => NULL,
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(5).svg',
                'counter_number' => 3082,
                'category' => 'counter',
            ],
            [
                'title' => 'programs',
                'description' => NULL,
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(4).svg',
                'counter_number' => 9,
                'category' => 'counter',
            ],
            [
                'title' => 'ping pong',
                'description' => 'a fast-paced, precision sport where players rally a small ball over a net, testing reflexes and finesse in an intense game of table tennis.',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(44).png',
                'counter_number' => NULL,
                'category' => 'activity',

            ],
            [
                'title' => 'chess',
                'description' => 'a timeless battle brain game of strategy and wit on a checkered battlefield',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(32).png',
                'counter_number' => NULL,
                'category' => 'activity',
            ],
            [
                'title' => 'football',
                'description' => 'a thrilling game of skill, teamwork, and passion, where players strive to score goals and claim victory on the pitch.',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(33).png',
                'counter_number' => NULL,
                'category' => 'activity',
            ],
        ];

        static $index = 0;
        $data = $details[$index];
        $index = ($index + 1) % count($details);

        return [
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'],
            'counter_number' => $data['counter_number'],
            'category' => $data['category'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

