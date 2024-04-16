<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $events = [
            [
                'id' => 1,
                'title' => 'Et voluptatem itaque non in voluptas aut voluptas.',
                'description' => 'Neque repellendus quae nostrum consequuntur. Et deleniti qui ut suscipit pariatur. Pariatur consequuntur voluptas earum unde ducimus sed.',
                'date' => '2024-04-05 13:09:15',
                'user_id' => 9,
                'created_at' => '2024-03-25 19:05:55',
                'updated_at' => '2024-03-25 19:05:55'
            ],
            [
                'id' => 2,
                'title' => 'Nesciunt aut qui excepturi fugit modi et non.',
                'description' => 'Dignissimos aut adipisci beatae perspiciatis. Est consequuntur ratione hic veritatis saepe doloribus. Deserunt corrupti et aliquid eveniet eaque et ut.',
                'date' => '2024-04-20 12:20:34',
                'user_id' => 7,
                'created_at' => '2024-03-25 19:05:55',
                'updated_at' => '2024-03-25 19:05:55'
            ],
            [
                'id' => 3,
                'title' => 'Voluptas animi inventore in ipsam.',
                'description' => 'Rerum voluptates inventore doloribus libero ipsa molestias. Aliquam mollitia ea nisi saepe non illum.',
                'date' => '2024-04-14 08:20:31',
                'user_id' => 6,
                'created_at' => '2024-03-25 19:05:55',
                'updated_at' => '2024-03-25 19:05:55'
            ],
            [
                'id' => 4,
                'title' => 'Ut tempore quos odit eaque fuga facere ut.',
                'description' => 'Recusandae autem fugiat ullam. Recusandae quis at a. Itaque aut rerum consectetur molestias dolorum praesentium. Nobis sed deserunt tempora et veniam culpa.',
                'date' => '2024-04-03 06:13:58',
                'user_id' => 6,
                'created_at' => '2024-03-25 19:05:55',
                'updated_at' => '2024-03-25 19:05:55'
            ]
        ];

        static $index = 0;
        $event = $events[$index];
        $index = ($index + 1) % count($events);

        return [
            'title' => $event['title'],
            'description' => $event['description'],
            'date' => $event['date'],
            'user_id' => $event['user_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
