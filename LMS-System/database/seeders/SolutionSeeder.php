<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Solution;
use Illuminate\Database\Seeder;

class SolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = User::where('role', 'student')->get();

        foreach ($students as $student) {

            $subjects = $student->enrolledSubjects;

            foreach ($subjects as $subject) {

                $tasks = $subject->tasks()->inRandomOrder()->limit(3)->get();

                foreach ($tasks as $task) {
                    Solution::factory()->create([
                        'user_id' => $student->id,
                        'task_id' => $task->id,
                    ]);
                }
            }
        }
    }
}
