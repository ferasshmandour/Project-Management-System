<?php

namespace App\Services;

use App\Models\Task;
use App\Enums\TaskStatus;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    public function getTasks(): Collection
    {
        return Task::all();
    }

    public function getTasksRelatedToProject($projectId): Collection
    {
        return Task::where('project_id', $projectId)->get();
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
            "project_id" => isset($request->project_id) ? $request->project_id : $task->project->id,
            "status_id" => isset($request->status_id) ? $request->status_id : $task->status->id,
            "title" => isset($request->title) ? $request->title : $task->title,
            "priority" => isset($request->priority) ? $request->priority : $task->priority,
            "due_date" => isset($request->due_date) ? $request->due_date : $task->due_date,
        ]);
    }

    public function deleteTask(int $id): void
    {
        Task::destroy($id);
    }

    public function taskStatuses(): Collection
    {
        return Status::all();
    }
}
