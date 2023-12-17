<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface EmployeeSalaryServiceInterface
{
    public function getEmployeeId(int $id): int;

    public function getEmployeeSalary(): Collection;

    public function addNewEmployeeSalary(array $params): void;

    public function editEmployeeSalary(Request $request, int $id): void;

    public function deleteEmployeeSalary(int $id): void;
}
