<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;

Route::get('/users-tasks/{userId}', [TaskController::class, 'getUserTasks']);
Route::post('/update-task-status/{taskId}', [TaskController::class, 'updateTaskStatus']);
