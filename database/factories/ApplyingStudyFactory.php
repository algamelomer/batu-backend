<?php

namespace Database\Factories;

use App\Models\ApplyingStudy;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplyingStudyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApplyingStudy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faculty = $this->faker->randomElement(['Industry and Energy', 'Health Sciences']);

        $category = $this->faker->randomElement(['university_requirements', 'head_section', 'head_page']);

        $titles = [
            'Industry and Energy' => [
                'university_requirements' => 'University Requirements for Industry and Energy',
                'head_section' => 'Head Section for Industry and Energy',
                'head_page' => 'Head Page for Industry and Energy',
            ],
            'Health Sciences' => [
                'university_requirements' => 'University Requirements for Health Sciences',
                'head_section' => 'Head Section for Health Sciences',
                'head_page' => 'Head Page for Health Sciences',
            ],
        ];

        $descriptions = [
            'Industry and Energy' => [
                'university_requirements' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'head_section' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
                'head_page' => 'Integer in eros vitae lorem tristique suscipit.',
            ],
            'Health Sciences' => [
                'university_requirements' => 'Phasellus nec tellus tincidunt, porta quam sed, luctus ipsum.',
                'head_section' => 'Nullam nec tortor nec ex finibus pharetra.',
                'head_page' => 'Vivamus et est ut felis vehicula venenatis nec vel ex.',
            ],
        ];

        return [
            'title' => $titles[$faculty][$category],
            'description' => $descriptions[$faculty][$category],
            'image' => $this->faker->imageUrl(),
            'faculty' => $faculty,
            'category' => $category,
        ];
    }
}
