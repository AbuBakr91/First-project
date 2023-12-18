<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Department;
use App\Models\DepartmentHead;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DepartmentHeadService implements DepartmentHeadServiceInterface
{

    public function getEmployeeId(int $id): int
    {
        return  Employee::where('id', $id)->first()->id;
    }

    public function getDepartmentId(int $id): int
    {
        return  Department::where('id', $id)->first()->id;
    }

    public function getDepartmentHead(): Collection
    {
        return DepartmentHead::all();
    }

    public function addNewDepartmentHead(array $params): void
    {
        $departmentHead = new DepartmentHead();
        $departmentHead->department_id = $params['department_id'];
        $departmentHead->employee_id = $params['employee_id'];
        $departmentHead->start_date = $params['start_date'];
        $departmentHead->save();
    }

    public function editDepartmentHead(Request $request, int $id): void
    {
        $departmentHead = DepartmentHead::findOrFail($id);

        if ($request->department_id) {
            $departmentHead->department_id = $request->department_id;
        }
        if ($request->employee_id) {
            $departmentHead->employee_id = $request->employee_id;
        }
        if ($request->start_date) {
            $departmentHead->start_date = $request->start_date;
        }

        $departmentHead->update();
    }

    public function deleteDepartmentHead(int $id): void
    {
        $departmentHead = DepartmentHead::findOrFail($id);
        $departmentHead->delete();
    }
}
