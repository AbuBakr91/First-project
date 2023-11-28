<?php

namespace App\Services;

class PositionResponseHelper
{
    public static function createResponse(array $params): \Illuminate\Http\JsonResponse
    {
        return response()->json($params);
    }
}
