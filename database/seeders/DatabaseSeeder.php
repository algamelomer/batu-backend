<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(15)->create();
        \App\Models\Faculty::factory(2)->create();
        \App\Models\department::factory(10)->create();
        \App\Models\StaffPrograms::factory(10)->create();
        \App\Models\StaffMembers::factory(10)->create();
        \App\Models\StudentProjects::factory(5)->create();
        \App\Models\AboutUniversity::factory(3)->create();
        \App\Models\UniversityLeaders::factory(4)->create();
        \App\Models\Certificates::factory(17)->create();
        \App\Models\Researches::factory(17)->create();
        \App\Models\FacultyLeaders::factory(4)->create();
        \App\Models\Feedback::factory(10)->create();
        \App\Models\JobOpportunities::factory(10)->create();
        \App\Models\LeaderCouncil::factory(10)->create();
        \App\Models\Politics::factory(20)->create();
        \App\Models\PresidentAlerts::factory(10)->create();
        \App\Models\SocialLinks::factory(4)->create();
        \App\Models\Detail::factory(3)->create();
        \App\Models\post::factory(4)->create();
        \App\Models\PostMedia::factory(4)->create();
        \App\Models\Event::factory(4)->create();
        \App\Models\EventMedia::factory(4)->create();
        \App\Models\EventStaffProgram::factory(4)->create();
        \App\Models\StudyPlan::factory(15)->create();
        \App\Models\FacultyAgent::factory(3)->create();
        \App\Models\FacultyAgentStaff::factory(15)->create();
        \App\Models\Applying::factory(2)->create();
        \App\Models\ApplyStaff::factory(5)->create();
        \App\Models\ApplyStudies::factory(6)->create();
        \App\Models\StaffSocial::factory(20)->create();
        \App\Models\StudentProjects::factory(20)->create();
        \App\Models\JobApplications::factory(20)->create();
        \App\Models\User::insert([
            [
                'name' => 'Ziad Hassan',
                'email' => 'zeyad.h.abaza@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$/j.g3Z2dUe9quhclr0PtNOQDnuVHtxaYo6AWUvyY1Zyyf2M2C/Q6u',
                'role' => 'superAdmin',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Omer Al-Gamel',
                'email' => 'omeralgamel@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'superAdmin',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Ahmed Al-Shentenawy',
                'email' => 'elshentenawy@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'superAdmin',
                'remember_token' => Str::random(10),
            ],
        ]);
    }
}
