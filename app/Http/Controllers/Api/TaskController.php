<?php

namespace App\Http\Controllers\Api;

use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function getUserTasks($userId): JsonResponse
    {
        $userTasks = $this->taskService->getUserTasks($userId);
        return $this->successResponse($userTasks);
    }

    public function updateTaskStatus(Request $request, $taskId): JsonResponse
    {
        $this->taskService->updateTaskStatus($request, $taskId);
        return $this->successResponse(null, "Task status updated successfully");
    }
}
