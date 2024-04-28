<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SqlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = base_path('public/assets/default/database.sql');

        if (file_exists($path)) {
            $sql = file_get_contents($path);

            try {
                DB::unprepared($sql);
                $this->command->info('Database seeded successfully.');
            } catch (\Exception $e) {
                $this->command->error('Error seeding database: ' . $e);
            }
        } else {
            $this->command->error('Database seed file not found.');
        }
    }
}
// php artisan db:seed --class=SqlSeeder
