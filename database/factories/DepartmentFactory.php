<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $departments = [
            [
                'name' => 'Information Technology',
                'faculty_id' => 1,
            ],
            [
                'name' => 'Pharmacy Assistant',
                'faculty_id' => 2,
            ],
            [
                'name' => 'Railway technology',
                'faculty_id' => 1,
            ],
            [
                'name' => 'Textile technology',
                'faculty_id' => 1,
            ],
            [
                'name' => 'Technology of tractors and agricultural equipment',
                'faculty_id' => 1,
            ],
            [
                'name' => 'Prosthodontics Technology',
                'faculty_id' => 2,
            ],
            [
                'name' => 'Pharmaceutical Technology',
                'faculty_id' => 2,
            ],
            [
                'name' => 'Food Industry Technology',
                'faculty_id' => 1,
            ],
            [
                'name' => 'Health Informatics Technology',
                'faculty_id' => 2,
            ],
            [
                'name' => 'Nursing Assistant Technology',
                'faculty_id' => 2,
            ],
        ];

        $department = $departments[$this->faker->numberBetween(0, count($departments) - 1)];
        $userIds = \App\Models\User::pluck('id')->toArray();

        return [
            'name' => $department['name'],
            'description' => $this->faker->paragraph,
            'logo' => $this->faker->imageUrl(),
            'image' => $this->faker->imageUrl(),
            'video' => $this->faker->url,
            'description_video' => $this->faker->paragraph,
            'vision' => $this->faker->sentence,
            'mission' => $this->faker->sentence,
            'faculty_id' => $department['faculty_id'],
            'user_id' => $this->faker->randomElement($userIds),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
