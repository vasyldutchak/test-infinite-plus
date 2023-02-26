<?php


namespace App\Repositories;


use App\Models\Project;
use Illuminate\Support\Collection;

interface ProjectRepositoryInterface
{
    /**
     * @param array $data
     * @return Project
     */
    public function create(array $data): Project;

    /**
     * @param int $id
     * @return Project
     */
    public function findOneById(int $id): Project;

    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param array $data
     * @param Project $project
     * @return Project
     * @throws \Exception
     */
    public function update(array $data, Project $project): Project;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
