@extends('layouts.app')

@section('title', 'View Task')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Task Details</h2>

            <div class="d-flex gap-2">
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary btn-sm">
                    ← Back to List
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">

                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">

                        <div class="mb-3">
                            <h6 class="text-muted mb-1">Title</h6>
                            <p class="fw-semibold mb-0">{{ $task->title }}</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="text-muted mb-1">Priority</h6>
                            <p class="mb-0">{{ $task->priority }}</p>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6 class="text-muted mb-1">Due Date</h6>
                                <p class="mb-0">{{ $task->due_date }}</p>
                            </div>

                            <div class="col-md-6">
                                <h6 class="text-muted mb-1">Project</h6>
                                <p class="mb-0">{{ $task->project->name }}</p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-muted mb-1">Status</h6>

                            <span class="badge bg-{{ $task->status->color }}">
                                {{ ucfirst($task->status->name) }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">
                                Edit Task
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
