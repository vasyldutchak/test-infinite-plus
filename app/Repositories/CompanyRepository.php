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
     * CompanyRepository constructor.
     * @param Company $company
     */
    public function __construct(Company $company)
    {
        $this->model = $company;
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Company
    {
        return $this->model->create($data);
    }

    /**
     * @inheritDoc
     */
    public function findOneById(int $id): Company
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
    public function update(array $data, Company $company): Company
    {
        $company->fill($data);

        if (!$company->save()) {
            throw new \Exception("Can't update company model (company ID: {$company->id}");
        }

        return $company;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }

}
