<?php

namespace Database\Factories;

use App\Models\ApplyStudies;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplyStudiesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApplyStudies::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titles = [
            'Engineering' => 'Engineering Program',
            'Computer Science' => 'Computer Science Program',
            'Business Administration' => 'Business Administration Program',
            'Finance' => 'Finance Program',
            'Marketing' => 'Marketing Program',
            'Medicine' => 'Medicine Program',
            'Law' => 'Law Program',
        ];

        $descriptions = [
            'Engineering' => 'This is the description for Engineering program',
            'Computer Science' => 'This is the description for Computer Science program',
            'Business Administration' => 'This is the description for Business Administration program',
            'Finance' => 'This is the description for Finance program',
            'Marketing' => 'This is the description for Marketing program',
            'Medicine' => 'This is the description for Medicine program',
            'Law' => 'This is the description for Law program',
        ];

        $faculties = array_keys($titles);
        $faculty = $this->faker->randomElement($faculties);
        $userIds = \App\Models\User::pluck('id')->toArray();
        $FacultyIds = \App\Models\Faculty::pluck('id')->toArray();
        return [
            'title' => $titles[$faculty],
            'description' => $descriptions[$faculty],
            'image' => $this->faker->imageUrl(),
            'graduate' => $this->faker->randomElement(["hight_school", "industrial", "industrial_institute"]),
            'user_id' => $this->faker->randomElement($userIds),
            'faculty_id' => $this->faker->randomElement($FacultyIds),
        ];
    }
}

