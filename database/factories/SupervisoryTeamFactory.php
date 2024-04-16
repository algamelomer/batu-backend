<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SupervisoryTeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $supervisory = [
            [
                'name' => 'dr. ibrahim el-faham',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(3).jpg',
                'description' => 'we prepare a generation of new modern technological educational students ready to work as they dont only learn academic',
                'position' => 'head',
                'faculty_id' => 1,
                'department_id' => null,
                'user_id' => 1,
            ],
            [
                'name' => 'dr. ossama',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(7).png',
                'description' => null,
                'position' => 'head',
                'faculty_id' => null,
                'department_id' => 1,
                'user_id' => 1,
            ],
            [
                'name' => 'Dr. Rania El-Sharkawy',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(4).jpg',
                'description' => 'we prepare a generation of new modern technological educational students ready to work as they dont only learn academic',
                'position' => 'head',
                'faculty_id' => 2,
                'department_id' => null,
                'user_id' => 1,
            ],
        ];

        static $index = 0;
        $supervisor = $supervisory[$index];
        $index = ($index + 1) % count($supervisory);

        return [
            'name' => $supervisor[ 'name'],
            'image' => $supervisor['image'],
            'description' => $supervisor['description'],
            'position' => $supervisor['position'],
            'faculty_id' => $supervisor['faculty_id'],
            'department_id' => $supervisor['department_id'],
            'user_id' => $supervisor['user_id'],
        ];
    }
}
