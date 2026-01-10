<?php

namespace App\Services;

use App\Enums\ProjectStatus;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectService
{
    public function getProjects(): Collection
    {
        return Project::with('tasks')->get();
    }

    public function getProject($id): Project
    {
        return Project::with('tasks')->findOrFail($id);
    }

    public function createProject(StoreProjectRequest $request): void
    {
        Project::create([
            "name" => $request->name,
            "description" => $request->description,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "status" => ProjectStatus::New,
        ]);
    }

    public function updateProject(UpdateProjectRequest $request, int $id): void
    {
        $project = Project::findOrFail($id);

        $project->update([
            "name" => isset($request->name) ? $request->name : $project->name,
            "description" => isset($request->description) ? $request->description : $project->description,
            "start_date" => isset($request->start_date) ? $request->start_date : $project->start_date,
            "end_date" => isset($request->end_date) ? $request->end_date : $project->end_date,
            "status" => isset($request->status) ? $request->status : $project->status,
        ]);
    }

    public function deleteProject(int $id): void
    {
        Project::destroy($id);
    }

    public function getStatuses(): array
    {
        return ProjectStatus::cases();
    }
}
