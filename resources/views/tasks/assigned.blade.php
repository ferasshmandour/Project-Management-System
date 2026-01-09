@extends('layouts.app')

@section('title', 'Assigned Tasks')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0 fw-bold">Assigned Tasks</h2>

            <a href="{{ route('tasks.assignment') }}" class="btn btn-primary btn-sm">
                Assign Task
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Task</th>
                                <th>Project</th>
                                <th>Assigned Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($assignedTasks as $assignedTask)
                                <tr>
                                    <td class="fw-semibold">{{ $assignedTask->id }}</td>
                                    <td>{{ $assignedTask->user->name }}</td>
                                    <td>{{ $assignedTask->task->title }}</td>
                                    <td>{{ $assignedTask->task->project->name }}</td>
                                    <td>{{ $assignedTask->created_at->format('Y-m-d') }}</td>

                                    <td class="text-end">
                                        <form action="{{ route('tasks.deassign', $assignedTask->id) }}" method="POST"
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
                                        No assigned tasks found 📭
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
