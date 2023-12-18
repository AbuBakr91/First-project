<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface DepartmentHeadServiceInterface
{
    public function getEmployeeId(int $id): int;

    public function getDepartmentId(int $id): int;

    public function getDepartmentHead(): Collection;

    public function addNewDepartmentHead(array $params): void;

    public function editDepartmentHead(Request $request, int $id): void;

    public function deleteDepartmentHead(int $id): void;
}
