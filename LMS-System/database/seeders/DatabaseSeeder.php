<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        DB::table('subjects')->truncate();
        DB::table('tasks')->truncate();

        User::factory(5)->create();

        // 1 fixed user for teacher
        User::factory()->create([
            'name' => 'teacher User',
            'email' => 'teacher@classhub.test',
            'password' => bcrypt('teacher123'),
            'role' => 'teacher',
            'email_verified_at' => now(),
        ]);

          // 1 fixed user for student
          User::factory()->create([
            'name' => 'student User',
            'email' => 'student@classhub.test',
            'password' => bcrypt('student123'),
            'role' => 'student',
            'email_verified_at' => now(),
        ]);

        $this->call(SubjectSeeder::class);
        $this->call(EnrollmentSeeder::class);
        $this->call(SolutionSeeder::class);

    }
}
