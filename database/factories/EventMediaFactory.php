<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventMedia>
 */
class EventMediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageUrls =  [
            [
                'id' => 1,
                'event_id' => 4,
                'file' => 'https://th.bing.com/th/id/OIP.YWNblpswlZV35859R1sFMwHaEL?w=305&h=180&c=7&r=0&o=5&pid=1.7',
                'type' => 'image',
                'created_at' => '2023-10-07 20:00:24',
                'updated_at' => '2023-11-10 23:51:49',
            ],
            [
                'id' => 2,
                'event_id' => 2,
                'file' => 'https://th.bing.com/th/id/OIP.a8MXvifdF742qmsNkADDuAHaEP?w=328&h=187&c=7&r=0&o=5&pid=1.7',
                'type' => 'image',
                'created_at' => '2023-09-08 22:39:50',
                'updated_at' => '2023-10-06 02:23:39',
            ],
            [
                'id' => 3,
                'event_id' => 3,
                'file' => 'https://th.bing.com/th/id/OIP.a8MXvifdF742qmsNkADDuAHaEP?w=328&h=187&c=7&r=0&o=5&pid=1.7',
                'type' => 'image',
                'created_at' => '2023-12-18 20:20:48',
                'updated_at' => '2024-02-19 17:06:03',
            ],
            [
                'id' => 4,
                'event_id' => 4,
                'file' => 'https://th.bing.com/th/id/OIP.a8MXvifdF742qmsNkADDuAHaEP?w=328&h=187&c=7&r=0&o=5&pid=1.7',
                'type' => 'image',
                'created_at' => '2023-11-10 00:06:23',
                'updated_at' => '2023-11-30 14:13:59',
            ],
        ];

        static $index = 0;
        $data = $imageUrls[$index];
        $index = ($index + 1) % count($imageUrls);

        return [
            'event_id' => $data['event_id'],
            'file' => $data['file'],
            'type' => 'image',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
