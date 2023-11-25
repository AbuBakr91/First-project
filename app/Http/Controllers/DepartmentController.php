<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\DepartmentInterface;
use App\Services\DepartmentResponseHelper;
use App\Services\DepartmentService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected DepartmentService $service;

    public function __construct(DepartmentInterface $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return $this->service->getDepartment();
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
            'id_leader' => $request->input('id_leader'),
        ];

        $this->service->addNewDepartment($params);

        return DepartmentResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Department created!'
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
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $this->service->editDepartment($request, $id);

        return DepartmentResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Department updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->deleteDepartment($id);

        return DepartmentResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Department deleted!'
        ]);
    }
}
