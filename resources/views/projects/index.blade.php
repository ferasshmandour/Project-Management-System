@extends('layouts.app')

@section('title', 'Project List')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0 fw-bold">Project List</h2>

            <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm">
                Add Project
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($projects as $project)
                                <tr>
                                    <td class="fw-semibold">{{ $project->id }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->start_date }}</td>
                                    <td>{{ $project->end_date }}</td>
                                    <td>{{ $project->status }}</td>
                                    <td>{{ $project->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $project->updated_at->format('Y-m-d') }}</td>

                                    <td class="text-end">
                                        <a href="{{ route('projects.edit', $project->id) }}"
                                            class="btn btn-outline-warning btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
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
                                    <td colspan="8" class="text-center py-4 text-muted">
                                        No projects found 📭
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
