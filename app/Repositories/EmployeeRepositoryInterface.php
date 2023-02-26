<?php


namespace App\Repositories;


use App\Models\Employee;
use Illuminate\Support\Collection;

interface EmployeeRepositoryInterface
{
    /**
     * @param array $data
     * @return Employee
     */
    public function create(array $data): Employee;

    /**
     * @param int $id
     * @return Employee
     */
    public function findOneById(int $id): Employee;

    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param array $data
     * @param Employee $employee
     * @return Employee
     * @throws \Exception
     */
    public function update(array $data, Employee $employee): Employee;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
