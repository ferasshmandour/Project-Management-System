@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0 fw-bold">Task List</h2>

            <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm">
                Add Task
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Project</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Due Date</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($tasks as $task)
                                <tr>
                                    <td class="fw-semibold">{{ $task->id }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->project->name }}</td>
                                    <td>{{ $task->priority }}</td>
                                    <td>
                                        <x-badge type="{{ $task->status->color }}">
                                            {{ $task->status->name }}
                                        </x-badge>
                                    </td>
                                    <td>{{ $task->due_date }}</td>
                                    <td>{{ $task->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $task->updated_at->format('Y-m-d') }}</td>

                                    <td class="text-end">
                                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-outline-info btn-sm">
                                            View
                                        </a>

                                        <a href="{{ route('tasks.edit', $task->id) }}"
                                            class="btn btn-outline-warning btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <x-button type="submit" class="btn btn-outline-danger btn-sm"
                                                needConfirm=true>Delete</x-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-4 text-muted">
                                        No tasks found 📭
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
