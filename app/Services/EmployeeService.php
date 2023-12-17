<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class EmployeeService implements EmployeeServiceInterface
{
    public function getEmployee(): Collection
    {
        return Employee::all();
    }

    public function addNewEmployee(array $params): void
    {
        $employee = new Employee();
        $employee->first_name = $params['first_name'];
        $employee->last_name = $params['last_name'];
        $employee->email = $params['email'];
        $employee->phone_number = $params['phone_number'];
        $employee->hire_date = $params['hire_date'];
        $employee->department_id = $params['department_id'];
        $employee->position_id = $params['position_id'];
        $employee->save();
    }

    public function editEmployee(Request $request, int $id): void
    {
        $employee = Employee::findOrFail($id);

        if ($request->first_name) {
            $employee->first_name = $request->first_name;
        }
        if ($request->last_name) {
            $employee->last_name = $request->last_name;
        }
        if ($request->email) {
            $employee->email = $request->email;
        }
        if ($request->phone_number) {
            $employee->phone_number = $request->phone_number;
        }
        if ($request->hire_date) {
            $employee->hire_date = $request->hire_date;
        }
        if ($request->department_id) {
            $employee->department_id = $request->department_id;
        }
        if ($request->position_id) {
            $employee->position_id = $request->position_id;
        }

        $employee->update();
    }

    public function deleteEmployee(int $id): void
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
    }

    public function getDepartmentId(int $id): int
    {
        return  Department::where('id', $id)->first()->id;
    }

    public function getPositionId(int $id): int
    {
        return  Position::where('id', $id)->first()->id;
    }
}
