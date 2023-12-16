<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface DepartmentServiceInterface
{
    public function getDepartment(): Collection;

    public function addNewDepartment(string $name): void;

    public function editDepartment(Request $request, int $id): void;

    public function deleteDepartment(int $id): void;
}
