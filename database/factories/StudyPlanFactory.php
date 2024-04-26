<?php

namespace Database\Factories;

use App\Models\StudyPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudyPlanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StudyPlan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = \App\Models\User::pluck('id')->toArray();
        $departmentIds = \App\Models\Department::pluck('id')->toArray();
        $staffMemberIds = \App\Models\StaffMembers::pluck('id')->toArray();
        $staffProgramIds = \App\Models\StaffPrograms::pluck('id')->toArray();
        
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'academic_year' => $this->faker->randomElement(['2023-2024', '2024-2025', '2025-2026']),
            'semester' => $this->faker->randomElement(['Fall', 'Spring', 'Summer']),
            'credits' => $this->faker->numberBetween(1, 5) . ' credits',
            'user_id' => $this->faker->randomElement($userIds),
            'department_id' => $this->faker->randomElement($departmentIds),
            'staff_programs_id' => $this->faker->randomElement($staffProgramIds),
            'staff_members_id' =>$this->faker->randomElement($staffMemberIds),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
