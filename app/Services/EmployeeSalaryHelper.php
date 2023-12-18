<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Request;

class EmployeeSalaryHelper
{
    public static function prepareData(Request $request): array
    {

        return [
            'employee_Id' => $request->input('employee_Id'),
            'salary_amount' => $request->input('salary_amount'),
        ];
    }
}
