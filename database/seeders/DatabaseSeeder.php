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
        \App\Models\User::factory(30)->create();
        \App\Models\Faculty::factory(2)->create();
        \App\Models\AboutUniversity::factory(10)->create();
        \App\Models\Detail::factory(6)->create();
        \App\Models\department::factory(11)->create();
        \App\Models\post::factory(4)->create();
        \App\Models\PostFile::factory(4)->create();
        \App\Models\Event::factory(4)->create();
        \App\Models\EventMedia::factory(4)->create();
        \App\Models\Job::factory(7)->create();
        \App\Models\JobApplication::factory(7)->create();
        \App\Models\FacultyMember::factory(13)->create();
        \App\Models\SupervisoryTeam::factory(3)->create();
        \App\Models\StudentProjects::factory(12)->create();
        \App\Models\StudyPlan::factory(29)->create();
        \App\Models\Applying::factory(6)->create();
        \App\Models\ApplyingStudy::factory(6)->create();

        \App\Models\User::insert([
            [
                'name' => 'Ziad Hassan',
                'email' => 'zeyad.h.abaza@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$mGKujEYgBXH1FilvXdhNoeesdHKQC1/HTPJcjoUG1darn.al6ETuC',
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
