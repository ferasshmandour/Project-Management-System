<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\ProjectService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    private ProjectService $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index(): View
    {
        $projects = $this->projectService->getProjects();
        return view("projects.index", compact("projects"));
    }

    public function show(int $id): View
    {
        $project = $this->projectService->getProject($id);
        return view("projects.view", compact("project"));
    }

    public function create(): View
    {
        $statuses = $this->projectService->getStatuses();
        return view("projects.create", compact("statuses"));
    }

    public function store(StoreProjectRequest $request)
    {
        try {
            $this->projectService->createProject($request);
            return redirect()->route("projects.index")->with("success", "Project created successfully");
        } catch (\Exception $e) {
            return back()->withInput()->with("error", "Error when create project");
        }
    }

    public function edit(int $id): View
    {
        $project = $this->projectService->getProject($id);
        $statuses = $this->projectService->getStatuses();
        return view("projects.edit", compact("project", "statuses"));
    }

    public function update(UpdateProjectRequest $request, int $id)
    {
        try {
            $this->projectService->updateProject($request, $id);
            return redirect()->route("projects.index")->with("success", "Project updated successfully");
        } catch (\Exception $e) {
            return back()->withInput()->with("error", "Error when update project");
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->projectService->deleteProject($id);
            return redirect()->back()->with("success", "Project deleted successfully");
        } catch (\Exception $e) {
            return back()->withInput()->with("error", "Error when delete project");
        }
    }
}
