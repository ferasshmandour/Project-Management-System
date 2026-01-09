@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Edit Task</h2>

            <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary btn-sm">
                ← Back to List
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">

                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Title</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title', $task->title) }}"
                                    placeholder="Enter task title">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="priority" class="form-label fw-semibold">Priority</label>
                                <input type="number" class="form-control @error('priority') is-invalid @enderror"
                                    id="priority" name="priority" value="{{ old('priority', $task->priority) }}"
                                    min="1" max="5" placeholder="Enter priority">
                                @error('priority')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="due_date" class="form-label fw-semibold">Due Date</label>
                                <input type="date" class="form-control @error('due_date') is-invalid @enderror"
                                    id="due_date" name="due_date" value="{{ old('due_date', $task->due_date) }}">
                                @error('due_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="project_id" class="form-label fw-semibold">Project</label>
                                <select class="form-select @error('project_id') is-invalid @enderror" id="project_id"
                                    name="project_id">
                                    <option selected disabled>{{ old('project_id', $task->project->name) }}</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">
                                            {{ $project->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('project_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status_id" class="form-label fw-semibold">Status</label>
                                <select class="form-select @error('status_id') is-invalid @enderror" id="status_id"
                                    name="status_id">
                                    <option selected disabled>{{ old('status_id', $task->status->name) }}</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}">
                                            {{ $status->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('status_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('projects.index') }}" class="btn btn-light">
                                    Cancel
                                </a>

                                <button type="submit" class="btn btn-success">
                                    Update Project
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
