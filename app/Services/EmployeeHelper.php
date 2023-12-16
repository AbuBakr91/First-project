<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Request;


class EmployeeHelper
{
public static function prepareData(Request $request): array
{

    return [
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email' => $request->input('email'),
        'phone_number' => $request->input('phone_number'),
        'hire_date' => $request->input('hire_date'),
        'department_id' => $request->input('department_id'),
        'position_id' => $request->input('position_id'),
    ];
}
}
