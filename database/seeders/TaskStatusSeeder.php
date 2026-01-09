<?php

namespace Database\Seeders;

use App\Enums\TaskStatus;
use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            "name" => TaskStatus::Pending,
            "color" => "secondary"
        ]);

        Status::create([
            "name" => TaskStatus::InProgress,
            "color" => "primary"
        ]);

        Status::create([
            "name" => TaskStatus::ToDo,
            "color" => "warning"
        ]);

        Status::create([
            "name" => TaskStatus::Done,
            "color" => "success"
        ]);

        Status::create([
            "name" => TaskStatus::Active,
            "color" => "success"
        ]);

        Status::create([
            "name" => TaskStatus::Inactive,
            "color" => "danger"
        ]);
    }
}
