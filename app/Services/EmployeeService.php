<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class EmployeeService implements EmployeeInterface
{
    public function getEmployee(): Collection
    {
        return Employee::all();
    }

    public function addNewEmployee(array $params): void
    {
        $employee = new Employee();
        $employee->id_department = $params['id_department'];
        $employee->id_post = $params['id_post'];
        $employee->name = $params['name'];
        $employee->surname = $params['surname'];
        $employee->email = $params['email'];
        $employee->phone_number = $params['phone_number'];
        $employee->salary = $params['salary'];
        $employee->date = $params['date'];
        $employee->save();
    }

    public function editEmployee(Request $request, int $id): void
    {
        $employee = Employee::findOrFail($id);

        if($request->id_department) {
            $employee->id_department = $request->id_department;
        }
        if($request->id_post) {
            $employee->id_post = $request->id_post;
        }
        if($request->name) {
            $employee->name = $request->name;
        }
        if($request->surname) {
            $employee->surname = $request->surname;
        }
        if($request->email) {
            $employee->email = $request->email;
        }
        if($request->phone_number) {
            $employee->phone_number = $request->phone_number;
        }
        if($request->salary) {
            $employee->salary = $request->salary;
        }
        if($request->date) {
            $employee->date = $request->date;
        }

        $employee->update();
    }

    public function deleteEmployee(int $id): void
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
    }
}
