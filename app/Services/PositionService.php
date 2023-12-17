<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Position;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PositionService implements PositionServiceInterface
{

    public function getPosition(): Collection
    {
        return Position::all();
    }

    public function addNewPosition(array $params): void
    {
        $position = new Position();
        $position->title = $params['title'];
        $position->description = $params['description'];

        $position->save();
    }

    public function editPosition(Request $request, int $id): void
    {
        $position = Position::findOrFail($id);

        if($request->title) {
            $position->title = $request->title;
        }
        if($request->description) {
            $position->description = $request->description;
        }

        $position->update();        }

    public function deletePosition(int $id): void
    {
        $position = Position::findOrFail($id);
        $position->delete();    }
}
