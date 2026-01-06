<?php

namespace App\Http\Controllers\Web;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\TaskService;

class TaskController extends Controller
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
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
        return view("tasks.create");
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
        return view("tasks.edit", compact("task"));
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
