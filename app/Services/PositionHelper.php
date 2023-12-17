<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Request;

class PositionHelper
{
    public static function prepareData(Request $request): array
    {

        return [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ];
    }
}
