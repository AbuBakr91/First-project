<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Request;

class DepartmentHeadHelper
{
    public static function prepareData(Request $request): array
    {

        return [
            'department_id' => $request->input('department_id'),
            'employee_id' => $request->input('employee_id'),
            'start_date' => $request->input('start_date'),

        ];
    }
}
