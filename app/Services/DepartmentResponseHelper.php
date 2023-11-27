<?php

namespace App\Services;

class DepartmentResponseHelper
{
    public static function createResponse(array $params): \Illuminate\Http\JsonResponse
    {
        return response()->json($params);
    }
}