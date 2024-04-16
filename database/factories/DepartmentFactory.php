<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departments = [
            [
                'name' => 'Information Technology',
                'faculty_id' => 1,
                'description' => "Discover cutting-edge Information Technology programs, shaping innovators for tomorrow's digital landscape. Unleash your potential with us.",
                'description_video' => "https://example.com/videos/it_programs.mp4",
                'logo' => 'https://linkdhub.github.io/batu-images/images/image%20(26).png',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(2).png',
                'video' => null,
                'user_id' => 1,
                'mission' => "To empower students with the knowledge and skills necessary to excel in the field of Information Technology.",
                'vision' => "To become a leading institution in producing IT professionals who drive innovation and contribute to global technological advancements.",
                'job_opportunities' => '["Software Developer", "Network Engineer", "Data Scientist", "Cybersecurity Analyst"]',
            ],
            [
                'name' => 'Pharmacy Assistant',
                'faculty_id' => 2,
                'description' => "Prepare for a career as a Pharmacy Assistant. Gain the skills and knowledge needed to assist pharmacists in various healthcare settings.",
                'description_video' => "https://example.com/videos/pharmacy_assistant_career.mp4",
                'logo' => 'https://linkdhub.github.io/batu-images/images/image%20(3).svg',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(4).jpeg',
                'video' => null,
                'user_id' => 1,
                'mission' => "To educate and train students to become competent and compassionate Pharmacy Assistants, contributing to the healthcare industry.",
                'vision' => "To be recognized as a premier institution in Pharmacy Assistant education, known for producing skilled professionals who positively impact patient care.",
                'job_opportunities' => '["Pharmacy Assistant", "Pharmacy Technician", "Pharmaceutical Sales Representative"]',
            ],
            [
                'name' => 'Railway technology',
                'faculty_id' => 1,
                'description' => "Specialize in train, railway, and mechanics technology with our comprehensive programs.",
                'description_video' => "https://example.com/videos/railway_technology.mp4",
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(9).jpeg',
                'logo' => 'https://linkdhub.github.io/batu-images/images/image%20(39).png',
                'video' => null,
                'user_id' => 1,
                'mission' => "To provide students with a solid foundation in railway technology, fostering innovation and excellence in the field.",
                'vision' => "To be a leading educational institution in railway technology, producing skilled professionals who drive advancements in transportation.",
                'job_opportunities' => '["Railway Engineer", "Mechanical Engineer", "Transportation Planner"]',
            ],
            [
                'name' => 'Textile technology',
                'faculty_id' => 1,
                'description' => "Dive into the world of textile technology and mechanization. Learn industry-leading techniques to revolutionize textile production.",
                'description_video' => "https://example.com/videos/textile_technology.mp4",
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(37).png',
                'logo' => 'https://linkdhub.github.io/batu-images/images/image%20(45).png',
                'video' => null,
                'user_id' => 1,
                'mission' => "To educate and equip students with the knowledge and skills required to excel in the field of textile technology.",
                'vision' => "To be a global leader in textile technology education, driving innovation and sustainability in the textile industry.",
                'job_opportunities' => '["Textile Engineer", "Fabric Technologist", "Fashion Designer"]',
            ],
            [
                'name' => 'Technology of tractors and agricultural equipment',
                'faculty_id' => 1,
                'description' => "Explore the latest advancements in tractor and agricultural equipment technology. Prepare for a career at the forefront of agricultural innovation.",
                'description_video' => "https://example.com/videos/agricultural_technology.mp4",
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(10).jpeg',
                'logo' => 'https://linkdhub.github.io/batu-images/images/image%20(43).png',
                'video' => null,
                'user_id' => 1,
                'mission' => "To provide students with comprehensive knowledge and practical skills in tractor and agricultural equipment technology.",
                'vision' => "To be a leading institution in agricultural technology education, contributing to sustainable farming practices worldwide.",
                'job_opportunities' => '["Agricultural Engineer", "Farm Machinery Mechanic", "Precision Agriculture Specialist"]',
            ],
            [
                'name' => 'Prosthodontics Technology',
                'faculty_id' => 2,
                'description' => "Specialize in prosthodontics technology and help individuals regain their smile and confidence. Join our innovative programs today!",
                'description_video' => "https://example.com/videos/prosthodontics_technology.mp4",
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(8).jpeg',
                'logo' => 'https://linkdhub.github.io/batu-images/images/image%20(38).png',
                'video' => null,
                'user_id' => 1,
                'mission' => "To train students to become skilled professionals in prosthodontics technology, enhancing oral health and quality of life.",
                'vision' => "To be a center of excellence in prosthodontics education, known for producing compassionate and competent dental professionals.",
                'job_opportunities' => '["Dental Technician", "Prosthodontist", "Dental Laboratory Technician"]',
            ],
            [
                'name' => 'Pharmaceutical Technology',
                'faculty_id' => 2,
                'description' => "Embark on a journey in pharmaceutical technology. Learn to develop and manufacture life-saving medications. Join us in shaping the future of healthcare!",
                'description_video' => "https://example.com/videos/pharmaceutical_technology.mp4",
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(7).jpeg',
                'logo' => 'https://linkdhub.github.io/batu-images/images/image%20(35).png',
                'video' => null,
                'user_id' => 1,
                'mission' => "To educate and train students in pharmaceutical technology, preparing them for careers in pharmaceutical manufacturing and research.",
                'vision' => "To be a center of excellence in pharmaceutical technology education, contributing to advancements in drug development and healthcare delivery.",
                'job_opportunities' => '["Pharmaceutical Technician", "Pharmaceutical Scientist", "Pharmaceutical Production Manager"]',
            ],
            [
                'name' => 'Food Industry Technology',
                'faculty_id' => 1,
                'description' => "This department is specialized in food industry technology and methods of preserving foodstuffs.",
                'description_video' => null,
                'logo' => 'https://linkdhub.github.io/batu-images/images/image%20(2).svg',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(3).jpeg',
                'video' => null,
                'user_id' => 1,
                'mission' => "To provide students with practical skills and knowledge in food industry technology, ensuring food safety and quality standards.",
                'vision' => "To be a leading institution in food technology education, fostering innovation and sustainability in the food industry.",
                'job_opportunities' => '["Food Technologist", "Quality Control Technician", "Food Safety Specialist"]',
            ],
            [
                'name' => 'Health Informatics Technology',
                'faculty_id' => 2,
                'description' => "Specialize in health informatics technology and data management in healthcare.",
                'description_video' => null,
                'logo' => 'https://linkdhub.github.io/batu-images/images/image%20(26).png',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(4).jpeg',
                'video' => null,
                'user_id' => 1,
                'mission' => "To equip students with the skills and knowledge to leverage technology for efficient healthcare data management and analysis.",
                'vision' => "To be a pioneer in health informatics education, driving improvements in healthcare quality and patient outcomes through technology.",
                'job_opportunities' => '["Health Informatics Specialist", "Health Data Analyst", "Clinical Informatics Manager"]',
            ],
            [
                'name' => 'Nursing Assistant Technology',
                'faculty_id' => 2,
                'description' => "This department is focused on training nursing assistants to provide quality patient care.",
                'description_video' => null,
                'logo' => 'https://linkdhub.github.io/batu-images/images/image%20(31).png',
                'image' => 'https://linkdhub.github.io/batu-images/images/image%20(6).jpeg',
                'user_id' => 1,
                'mission' => "To educate and prepare nursing assistants to deliver compassionate and competent care to patients.",
                'vision' => "To be a recognized leader in nursing assistant education, producing highly skilled professionals who enhance healthcare delivery.",
                'video' => null,
                'job_opportunities' => '["Nursing Assistant", "Patient Care Assistant", "Home Health Aide"]',
            ],
        ];

        static $index = 0;
        $department = $departments[$index];
        $index = ($index + 1) % count($departments);

        return [
            'name' => $department['name'],
            'description' => $department['description'],
            'description_video' => $department['description_video'],
            'image' => $department['image'],
            'logo' => $department['logo'],
            'video' => $department['video'],
            'job_opportunities' => json_decode($department['job_opportunities']),
            'vision' => $this->faker->paragraph,
            'mission' => $this->faker->paragraph,
            'user_id' => $department['user_id'],
            'faculty_id' => $department['faculty_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
