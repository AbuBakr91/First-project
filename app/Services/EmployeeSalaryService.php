<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Employee;
use App\Models\EmployeeSalary;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class EmployeeSalaryService implements EmployeeSalaryServiceInterface
{

    public function getEmployeeId(int $id): int
    {
        return  Employee::where('id', $id)->first()->id;
    }

    public function getEmployeeSalary(): Collection
    {
        return EmployeeSalary::all();
    }

    public function addNewEmployeeSalary(array $params): void
    {
        $employeeSalary = new EmployeeSalary();
        $employeeSalary->employee_Id = $params['employee_Id'];
        $employeeSalary->salary_amount = $params['salary_amount'];

        $employeeSalary->save();
    }

    public function editEmployeeSalary(Request $request, int $id): void
    {
        $employeeSalary = EmployeeSalary::findOrFail($id);

        if ($request->employee_Id) {
            $employeeSalary->employee_Id = $request->employee_Id;
        }
        if ($request->salary_amount) {
            $employeeSalary->salary_amount = $request->salary_amount;
        }

        $employeeSalary->update();
    }

    public function deleteEmployeeSalary(int $id): void
    {
        $employeeSalary = EmployeeSalary::findOrFail($id);
        $employeeSalary->delete();    }
}
