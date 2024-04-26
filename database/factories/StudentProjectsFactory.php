<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentProjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $projects = [
            [
                'name' => 'blind glasses',
                'description' => 'Blind glasses are smart glasses, designed by the Allenz team, that aimed to helping blind people and visually impaired, It can sense distances via smart sensors, and it alerts the user through a sound system when approaching a collision with something.',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(12).png',
                'team_name' => 'alians team',
                'department_id' => 1,
            ],
            [
                'name' => 'self driving car',
                'description' => 'this car can move on black lines using the ir sensors and can avoid obstacle and move away using the ultrasonic sensor then get back to the track again',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(11).jpg',
                'team_name' => 'project cooperation',
                'department_id' => 1,
                'faculty_id' => 1,
            ],
            [
                'name' => 'bionic arm',
                'description' => 'An electronic arm, which is a very advanced prosthetic limb that can be controlled via Bluetooth technology Through the mobile application, it also features a built-in alarm clock and stopwatch, making it a versatile tool for individuals who need a synthetic solution. practical',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(11).png',
                'team_name' => 'Technology inventors',
                'department_id' => 1,
                'faculty_id' => 1,
            ],
            [
                'name' => 'Wall-E robot',
                'description' => 'A model of an E-Wall-inspired robot that performs a range of tasks such as walking in Specific routes, monitoring and tracking',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(48).png',
                'team_name' => 'not comparisted',
                'department_id' => 1,
                'faculty_id' => 1,
            ],
            [
                'name' => 'Brake system',
                'description' => 'A brake system wood is a component used in braking systems, typically found in older vehicles or those with drum brakes. It\'s a wedge-shaped block made of a special type of wood, often hardwood, such as oak or ash. When the brake pedal is pressed, the brake system wood is pushed against the inside of the brake drum, creating friction and causing the vehicle to slow down or stop. However, brake system wood is less common today, as most modern vehicles use disc brakes, which employ brake pads and calipers instead.',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(13).png',
                'team_name' => 'Brake system',
                'department_id' => 6,
                'faculty_id' => 1,
            ],
        ];

        static $index = 0;
        $project = $projects[$index];
        $index = ($index + 1) % count($projects);
        $userIds = \App\Models\User::pluck('id')->toArray();

        return [
            'name' => $project['name'],
            'description' => $project['description'],
            'image' => $project['image'],
            'file' => null,
            'team_name' => $project['team_name'],
            'department_id' => $project['department_id'],
            'user_id' => $this->faker->randomElement($userIds),
        ];
    }
}
