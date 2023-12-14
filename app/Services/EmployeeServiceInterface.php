<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface EmployeeServiceInterface
{
    public function getDepartmentId(int $id): int;

    public function getPositionId(int $id): int;

    public function getEmployee(): Collection;

    public function addNewEmployee(array $params): void;

    public function editEmployee(Request $request, int $id): void;

    public function deleteEmployee(int $id): void;
}
