<?php


namespace App\Repositories;


use App\Models\Employee;
use Illuminate\Support\Collection;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    /**
     * @var Employee
     */
    private Employee $model;

    /**
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->model = $employee;
    }


    /**
     * @inheritDoc
     */
    public function create(array $data): Employee
    {
        return $this->model->create($data);
    }

    /**
     * @inheritDoc
     */
    public function findOneById(int $id): Employee
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
    public function update(array $data, Employee $employee): Employee
    {
        $employee->fill($data);

        if (!$employee->save()) {
            throw new \Exception("Can't update company model (employee ID: {$employee->id}");
        }

        return $employee;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }
}
