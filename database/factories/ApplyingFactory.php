<?php

namespace Database\Factories;

use App\Models\Applying;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplyingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Define specific titles and descriptions based on category
        $titles = [
            'administrative' => 'Administrative Applying Title',
            'teaching_staff' => 'Teaching Staff Applying Title',
            'other' => 'Other Applying Title',
            'head_section' => 'Head Section Applying Title',
            'head_page' => 'Head Page Applying Title',
        ];

        $descriptions = [
            'administrative' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'teaching_staff' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
            'other' => 'Phasellus nec tellus tincidunt, porta quam sed, luctus ipsum.',
            'head_section' => 'Nullam nec tortor nec ex finibus pharetra.',
            'head_page' => 'Vivamus et est ut felis vehicula venenatis nec vel ex.',
        ];

        return [
            'title' => $titles[$this->faker->randomElement(['administrative', 'teaching_staff', 'other', 'head_section', 'head_page'])],
            'description' => $descriptions[$this->faker->randomElement(['administrative', 'teaching_staff', 'other', 'head_section', 'head_page'])],
            'image' => null,
            'category' => $this->faker->randomElement(['administrative', 'teaching_staff', 'other', 'head_section', 'head_page']),
        ];
    }
}
