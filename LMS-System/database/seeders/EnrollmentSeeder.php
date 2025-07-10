<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

          $students = User::where('role', 'student')->get();


          $subjectIds = Subject::pluck('id');

          foreach ($students as $student) {
              $randomSubjectIds = $subjectIds->random(rand(2, 4));
              $student->enrolledSubjects()->attach($randomSubjectIds);
          }
    }
}
