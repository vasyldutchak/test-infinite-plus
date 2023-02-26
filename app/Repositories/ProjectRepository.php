<?php


namespace App\Repositories;


use App\Models\Project;
use Illuminate\Support\Collection;

class ProjectRepository implements ProjectRepositoryInterface
{

    /**
     * @var Project
     */
    private Project $model;

    /**
     * ProjectRepository constructor.
     * @param Project $project
     */
    public function __construct(Project $project)
    {
        $this->model = $project;
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Project
    {
        return $this->model->create($data);
    }

    /**
     * @inheritDoc
     */
    public function findOneById(int $id): Project
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function getAll(): Collection
    {
        return $this->model->all();
    }

    /**
     * @inheritDoc
     */
    public function update(array $data, Project $project): Project
    {
        $project->fill($data);

        if (!$project->save()) {
            throw new \Exception("Can't update company model (employee ID: {$project->id}");
        }

        return $project;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }
}
