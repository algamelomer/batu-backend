<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // مسار الملف SQL
        $path = base_path('public/assets/default/database.sql');

        // التحقق من وجود الملف
        if (file_exists($path)) {
            $sql = file_get_contents($path);

            // تنفيذ الاستعلامات SQL
            try {
                DB::unprepared($sql);
                $this->command->info('Database seeded successfully.');
            } catch (\Exception $e) {
                $this->command->error('Error seeding database: '.$e );
            }
        } else {
            $this->command->error('Database seed file not found.');
        }
    }
}
