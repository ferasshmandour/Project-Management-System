<?php

namespace App\Services;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    public function getTasks(): Collection
    {
        return Task::all();
    }

    public function getTask(int $id): Task
    {
        return Task::findOrFail($id);
    }

    public function createTask(StoreTaskRequest $request): void
    {
        $task = Task::create([
            "project_id" => $request->project_id,
            "status_id" => $request->status_id,
            "title" => $request->title,
            "priority" => $request->priority,
            "due_date" => $request->due_date,
        ]);

        if ($request->user_id != null) {
            $task->user_id = $request->user_id;
        }
    }

    public function updateTask(UpdateTaskRequest $request, int $id): void
    {
        $task = Task::findOrFail($id);

        $task->update([
            "project_id" => $request->project_id,
            "status_id" => $request->status_id,
            "title" => $request->title,
            "priority" => $request->priority,
            "due_date" => $request->due_date,
            "user_id" => $request->user_id,
        ]);
    }

    public function deleteTask(int $id): void
    {
        Task::destroy($id);
    }
}
