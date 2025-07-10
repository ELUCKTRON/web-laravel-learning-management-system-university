<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $teachers = User::where('role', 'teacher')->get();
        $teachers->each(function ($teacher){
            \App\Models\Subject::factory()
            ->count(5)
            ->for($teacher)
            ->hasTasks(5)
            ->create();
        });

    }
}
