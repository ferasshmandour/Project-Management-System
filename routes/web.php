<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('projects.index');
});

Route::resource('projects', ProjectController::class);
Route::resource('tasks', TaskController::class);

// list of assigned tasks
Route::get('/assigned-tasks', [TaskController::class, 'assignedTasks'])->name('tasks.assigned');

// view for assign or deassign task
Route::get('/tasks-assignment', [TaskController::class, 'taskAssignment'])->name('tasks.assignment');

// assign task to user
Route::post('/assign-task', [TaskController::class, 'assignTask'])->name('tasks.assign');

// de assign using id
