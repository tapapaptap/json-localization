<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Project as ProjectModel;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Resources\Project\ProjectResource;
use App\Facades\Project;
use App\Http\Resources\Project\MinifiedProjectResource;
use Illuminate\Http\JsonResponse;
use App\Service\Project\ProjectService;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        //
        return MinifiedProjectResource::collection(
            ProjectModel::query()
                ->where('user_id', Auth::id())
                ->get()
        );
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->validated());

        return new ProjectResource($project);
    }

    public function show(ProjectModel $project)
    {
        //
        return new ProjectResource($project);
    }

    public function update(UpdateProjectRequest $request, ProjectModel $project,ProjectService $projectService): JsonResponse 
    {
        $updatedProject = $projectService 
            ->setProject($project)
            ->update($request->validated());
        
        return response()->json($updatedProject);
    }
    
    public function destroy(ProjectModel $project)
    {
        //
        $project->delete();

        return responseOk();
    }
}
