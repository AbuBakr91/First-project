<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\JsonResponse;

class DepartmentHeadResponseHelper
{
    public static function createResponse(array $params): JsonResponse
    {
        return response()->json($params);
    }
}
