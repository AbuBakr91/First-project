<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DepartmentService implements DepartmentServiceInterface
{

    public function getDepartment(): Collection
    {
        return Department::all();
    }

    public function addNewDepartment(string $name): void
    {
        $department = new Department();

        $department->name = $name;

        $department->save();
    }

    public function editDepartment(Request $request, int $id): void
    {
        $department = Department::findOrFail($id);

        if($request->name) {
            $department->name = $request->name;
        }

        $department->update();    }

    public function deleteDepartment(int $id): void
    {
        $department = Department::findOrFail($id);
        $department->delete();
    }
}
