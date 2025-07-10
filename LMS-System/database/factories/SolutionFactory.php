<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Solution>
 */
class SolutionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'task_id'   => Task::inRandomOrder()->first()?->id ?? Task::factory(),
            'user_id'   => User::inRandomOrder()->first()?->id ?? User::factory(),
            'title'     => $this->faker->sentence(3),
            'content'   => $this->faker->paragraph(4),
            'file_path' => 'solutions/' . fake()->randomElement(['sample.pdf', 'sample.zip', 'sample.png']),
            'grade'     => $this->faker->optional()->numberBetween(1, 5),
        ];
    }
}
