<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\ProjectService;
use App\Services\TaskService;

class TaskController extends Controller
{
    private TaskService $taskService;
    private ProjectService $projectService;

    public function __construct(TaskService $taskService, ProjectService $projectService)
    {
        $this->taskService = $taskService;
        $this->projectService = $projectService;
    }

    public function index(): View
    {
        $tasks = $this->taskService->getTasks();
        return view("tasks.index", compact("tasks"));
    }

    public function show(int $id): View
    {
        $task = $this->taskService->getTask($id);
        return view("tasks.view", compact("task"));
    }

    public function create(): View
    {
        $statuses = $this->taskService->taskStatuses();
        $projects = $this->projectService->getProjects();

        return view("tasks.create", compact("statuses", "projects"));
    }

    public function store(StoreTaskRequest $request)
    {
        try {
            $this->taskService->createTask($request);
            return redirect()->route("tasks.index")->with("success", "Task created successfully");
        } catch (\Exception $e) {
            return back()->withInput()->with("error", "Error when create task");
        }
    }

    public function edit(int $id): View
    {
        $task = $this->taskService->getTask($id);
        $statuses = $this->taskService->taskStatuses();
        $projects = $this->projectService->getProjects();

        return view("tasks.edit", compact("task", "statuses", "projects"));
    }

    public function update(UpdateTaskRequest $request, int $id)
    {
        try {
            $this->taskService->updateTask($request, $id);
            return redirect()->route("tasks.index")->with("success", "Task updated successfully");
        } catch (\Exception $e) {
            return back()->withInput()->with("error", "Error when update task");
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->taskService->deleteTask($id);
            return redirect()->back()->with("success", "Task deleted successfully");
        } catch (\Exception $e) {
            return back()->withInput()->with("error", "Error when delete task");
        }
    }
}
