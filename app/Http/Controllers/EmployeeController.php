<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\EmployeeInterface;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Ramsey\Collection\Collection;

class EmployeeController extends Controller
{
    protected EmployeeService $service;

    public function __construct(EmployeeInterface $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return $this->service->getEmployee();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $params = [
            'id_department' => $request->input('id_department'),
            'id_post' => $request->input('id_post'),
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'date' => $request->input('date'),
        ];

        $this->service->addNewEmployee($params);

        return EmployeeResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Employee created!'
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
        $this->service->editEmployee($request, $id);

        return EmployeeResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Employee updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $this->service->deleteEmployee($id);

        return EmployeeResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Employee deleted!'
        ]);
    }
}
