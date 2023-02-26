<?php


namespace App\Repositories;


use App\Models\Company;
use Illuminate\Support\Collection;

class CompanyRepository implements CompanyRepositoryInterface
{

    /**
     * @var Company
     */
    private Company $model;

    /**
     * @param Company $warehouse
     */
    public function __construct(Company $warehouse)
    {
        $this->model = $warehouse;
    }

    /**
     * @param array $data
     * @return Company
     */
    public function create(array $data): Company
    {
        return $this->model->create($data);
    }

    /**
     * @param int $id
     * @return Company
     */
    public function findOneById(int $id): Company
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param array $data
     * @param Company $company
     * @return Company
     * @throws \Exception
     */
    public function update(array $data, Company $company): Company
    {
        $company->fill($data);

        if (!$company->save()) {
            throw new \Exception("Can't update company model (company ID: {$company->id}");
        }

        return $company;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }

}
