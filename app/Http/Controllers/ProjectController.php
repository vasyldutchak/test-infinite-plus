<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Repositories\ProjectRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{

    /**
     * @var ProjectRepositoryInterface
     */
    private ProjectRepositoryInterface $projectRepo;

    /**
     * ProjectController constructor.
     * @param ProjectRepositoryInterface $projectRepo
     */
    public function __construct(ProjectRepositoryInterface $projectRepo)
    {
        $this->projectRepo = $projectRepo;
    }

    /**
     * Display a listing of the resource.
     * @return JsonResponse|ProjectCollection
     */
    public function index(): JsonResponse|ProjectCollection
    {
        try {
            return new ProjectCollection($this->projectRepo->getAll());
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreProjectRequest $request
     * @return JsonResponse
     */
    public function store(StoreProjectRequest $request): JsonResponse
    {
        try {
            $project = $this->projectRepo->create($request->all());

            return response()->json(
                [
                    'message' => 'Success',
                    'projectId' => $project->id
                ]
            );
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     * @param string $id
     * @return JsonResponse|ProjectResource
     */
    public function show(string $id): JsonResponse|ProjectResource
    {
        try {
            return new ProjectResource($this->projectRepo->findOneById($id));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateProjectRequest $request
     * @param Project $project
     * @return JsonResponse
     */
    public function update(UpdateProjectRequest $request, Project $project): JsonResponse
    {
        try {
            $this->projectRepo->update($request->all(), $project);

            return response()->json(['message' => 'Success']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $this->projectRepo->delete($id);

            return response()->json(['message' => 'Success']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
