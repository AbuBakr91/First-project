<?php

namespace App\Services;

use App\Models\Position;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PositionService implements PositionInterface
{

    public function getPosition(): Collection
    {
        return Position::all();
    }

    public function addNewPosition(array $params): void
    {
        $position = new Position();

        $position->name = $params['name'];
        $position->description = $params['description'];
        $position->dep_name = $params['dep_name'];

        $position->save();
    }

    public function editPosition(Request $request, int $id): void
    {
        $position = Position::findOrFail($id);

        if($request->name) {
            $position->name = $request->name;
        }
        if($request->description) {
            $position->description = $request->description;
        }
        if($request->dep_name) {
            $position->dep_name = $request->dep_name;
        }

        $position->update();
    }

    public function deletePosition(int $id): void
    {
        $position = Position::findOrFail($id);
        $position->delete();
    }
}


