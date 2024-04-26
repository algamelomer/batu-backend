<?php

namespace Database\Factories;

use App\Models\StaffSocial;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaffSocialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StaffSocial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = \App\Models\User::pluck('id')->toArray();
        $staffMemberIds = \App\Models\StaffMembers::pluck('id')->toArray();
        $staffProgramIds = \App\Models\StaffPrograms::pluck('id')->toArray();
        $facultyLeaderIds = \App\Models\FacultyLeaders::pluck('id')->toArray();
        $universityLeaderIds = \App\Models\UniversityLeaders::pluck('id')->toArray();

        // Choose one random element to have a value
        $staffProgramId = $this->faker->randomElement([$this->faker->randomElement($staffProgramIds), null]);
        $staffMemberId = $this->faker->randomElement([$this->faker->randomElement($staffMemberIds), null]);
        $facultyLeaderId = $this->faker->randomElement([$this->faker->randomElement($facultyLeaderIds), null]);
        $universityLeaderId = $this->faker->randomElement([$this->faker->randomElement($universityLeaderIds), null]);

        return [
            'name' => $this->faker->randomElement(['Facebook', 'Instagram', 'X', 'LinkedIN', 'GitHub']),
            'image' => $this->faker->imageUrl(300,300),
            'link' => $this->faker->url,
            'user_id' => $this->faker->randomElement($userIds),
            'staff_programs_id' => $staffProgramId,
            'staff_members_id' => $staffMemberId,
            'faculty_leaders_id' => $facultyLeaderId,
            'university_leaders_id' => $universityLeaderId,
        ];
    }
}
