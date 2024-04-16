<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faculty>
 */
class FacultyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $data = [
            [
                'name' => 'Industry and Energy College',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(1).jpeg',
                'logo' => 'https://linkdhub.github.io/batu-images/images/image%20(6).jpg',
                'video' => 'https://www.youtube.com/embed/pvSBNXagQ1I',
                'description_video' => 'a video describes the faculty',
                'description' => 'Industry and Energy College offers cutting-edge programs in IT, railway, tractors, textiles, and food industry, fostering innovation for future leaders.',
                'vision' => 'This college is committed to providing high-quality technical education in various fields of industry and energy.',
                'mission' => 'Our mission is to educate and empower students with the knowledge and skills required to excel in their chosen careers and contribute to the development of the industry and energy sectors.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Health Science Technology',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(5).jpeg',
                'logo' => 'https://linkdhub.github.io/batu-images/images/image%20(5).jpg',
                'video' => 'https://www.youtube.com/embed/srEQJxEzvyA',
                'description_video' => 'Dr. Rania Al-Sharqawi describes the Faculty of Health Sciences and Departments',
                'description' => 'Programs include Nursing Assistant, Pharmacist Assistant, Dental Assistant, and Health Information Technology.',
                'vision' => 'Our vision is to be a leading institution in health science education, producing competent professionals who contribute to the improvement of healthcare services.',
                'mission' => 'We are dedicated to providing quality education and training in health science disciplines, preparing students for successful careers in healthcare.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        // $faculty = collect($data)->unique('name')->random();
        static $index = 0;
        $faculty = $data[$index];
        $index = ($index + 1) % count($data);
        return [
            'name' => $faculty['name'],
            'image' => $faculty['image'],
            'logo' => $faculty['logo'],
            'video' => $faculty['video'],
            'description_video' => $faculty['description_video'],
            'description' => $faculty['description'],
            'vision' => $this->faker->paragraph,
            'mission' => $this->faker->paragraph,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
