<?php

declare(strict_types=1);

namespace App\Services;

class EmployeeSalaryResponseHelper
{
    public static function createResponse(array $params): \Illuminate\Http\JsonResponse
    {
        return response()->json($params);
    }
}
