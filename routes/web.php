<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('projects.index');
});

Route::resource('users', UserController::class);
Route::resource('projects', ProjectController::class);
Route::resource('tasks', TaskController::class);

Route::get('/assigned-tasks', [TaskController::class, 'assignedTasks'])->name('tasks.assigned');
Route::get('/tasks-assignment', [TaskController::class, 'taskAssignment'])->name('tasks.assignment');
Route::post('/assign-task', [TaskController::class, 'assignTask'])->name('tasks.assign');
Route::delete('/deassign-task/{id}', [TaskController::class, 'deAssignTask'])->name('tasks.deassign');
