<?php

namespace App\Services;

use App\Models\Task;
use App\Models\Status;
use App\Models\TaskUser;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\AssignTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

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

    public function getTask($id): Task
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

    public function getAssignedTasks(): Collection
    {
        return TaskUser::all();
    }

    public function assignTask(AssignTaskRequest $request): void
    {
        TaskUser::create([
            'task_id' => $request->task_id,
            'user_id' => $request->user_id,
        ]);
    }

    public function deAssignTask(int $id): void
    {
        TaskUser::destroy($id);
    }

    public function getUserTasks($userId)
    {
        return DB::table('task_user as tu')
            ->join('tasks as t', 't.id', '=', 'tu.task_id')
            ->where('tu.user_id', $userId)
            ->get();
    }

    public function updateTaskStatus(Request $request, $taskId): void
    {
        $status = strtolower($request->query('status'));
        Task::where('id', $taskId)->update([
            'status_id' => Status::where('name', $status)->first()->id,
        ]);
    }
}
