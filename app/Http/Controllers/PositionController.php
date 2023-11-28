<?php

namespace App\Http\Controllers;

use App\Services\PositionInterface;
use App\Services\PositionResponseHelper;
use App\Services\PositionService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    protected PositionService $service;

    public function __construct(PositionInterface $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return $this->service->getPosition();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $params = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'dep_name' => $request->input('dep_name'),
        ];

        $this->service->addNewPosition($params);

        return PositionResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Position created!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $this->service->editPosition($request, $id);

        return PositionResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Position updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->deletePosition($id);

        return PositionResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Position deleted!'
        ]);
    }
}








