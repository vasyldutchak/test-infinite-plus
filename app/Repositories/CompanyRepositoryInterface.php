<?php


namespace App\Repositories;


use App\Models\Company;
use Illuminate\Support\Collection;

interface CompanyRepositoryInterface
{
    /**
     * @param array $data
     * @return Company
     */
    public function create(array $data): Company;

    /**
     * @param int $id
     * @return Company
     */
    public function findOneById(int $id): Company;

    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param array $data
     * @param Company $company
     * @return Company
     */
    public function update(array $data, Company $company): Company;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
