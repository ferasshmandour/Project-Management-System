@extends('layouts.app')

@section('title', 'View Project')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Project Details</h2>

            <div class="d-flex gap-2">
                <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary btn-sm">
                    ← Back to List
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">

                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">

                        <div class="mb-3">
                            <h6 class="text-muted mb-1">Name</h6>
                            <p class="fw-semibold mb-0">{{ $project->name }}</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="text-muted mb-1">Description</h6>
                            <p class="mb-0">{{ $project->description ?? '—' }}</p>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6 class="text-muted mb-1">Start Date</h6>
                                <p class="mb-0">{{ $project->start_date?->format('Y-m-d') ?? '—' }}</p>
                            </div>

                            <div class="col-md-6">
                                <h6 class="text-muted mb-1">End Date</h6>
                                <p class="mb-0">{{ $project->end_date?->format('Y-m-d') ?? '—' }}</p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-muted mb-1">Status</h6>

                            @php
                                $statusClasses = [
                                    'new' => 'secondary',
                                    'active' => 'primary',
                                    'completed' => 'success',
                                    'inactive' => 'danger',
                                    'panding' => 'warning',
                                ];

                                $statusValue = $project->status?->value ?? $project->status;
                            @endphp

                            <span class="badge bg-{{ $statusClasses[$statusValue] ?? 'secondary' }}">
                                {{ ucfirst($statusValue) }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">
                                Edit Project
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                        <h5 class="fw-semibold mb-0">Project Tasks</h5>

                        <span class="badge bg-secondary">
                            {{ $tasks->count() }} Tasks
                        </span>
                    </div>

                    <div class="card-body p-0">
                        @if ($tasks->isEmpty())
                            <div class="p-4 text-center text-muted">
                                No tasks are assigned to this project.
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Priority</th>
                                            <th>Due Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $task)
                                            <tr>
                                                <td class="fw-semibold">
                                                    {{ $task->title }}
                                                </td>

                                                <td>
                                                    <span class="badge bg-info">
                                                        {{ ucfirst($task->status->name ?? '—') }}
                                                    </span>
                                                </td>

                                                <td>
                                                    <span class="badge bg-warning text-dark">
                                                        {{ ucfirst($task->priority) }}
                                                    </span>
                                                </td>

                                                <td>
                                                    {{ $task->due_date }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
