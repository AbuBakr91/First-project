<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface PositionServiceInterface
{
    public function getPosition(): Collection;

    public function addNewPosition(array $params): void;

    public function editPosition(Request $request, int $id): void;

    public function deletePosition(int $id): void;
}
