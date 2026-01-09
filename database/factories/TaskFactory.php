<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Project;
use App\Enums\TaskStatus;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'status_id' => Status::where('name', TaskStatus::Active)->first()->id,
            'title' => $this->faker->sentence(3),
            'priority' => $this->faker->numberBetween(1, 5),
            'due_date' => $this->faker->dateTimeBetween('now', '+2 months'),
        ];
    }
}
