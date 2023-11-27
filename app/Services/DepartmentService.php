<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DepartmentService implements DepartmentInterface
{

    public function getDepartment(): Collection
    {
        return Department::all();
    }

    public function addNewDepartment(array $params): void
    {
        $department = new Department();

        $department->name = $params['name'];
        $department->description = $params['description'];
        $department->id_leader = $params['id_leader'];

        $department->save();
    }

    public function editDepartment(Request $request, int $id): void
    {
        $department = Department::findOrFail($id);

        if($request->name) {
            $department->name = $request->name;
        }
        if($request->description) {
            $department->description = $request->description;
        }
        if($request->id_leader) {
            $department->id_leader = $request->id_leader;
        }

        $department->update();    }

    public function deleteDepartment(int $id): void
    {
        $department = Department::findOrFail($id);
        $department->delete();    }
}