<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\EmployeeInterface;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

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
    public function index()
    {
        return $this->service->getEmployee();
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
    public function store(Request $request)
    {
        try {
            $departmentId = $this->service->getNameId($request->input('id'));
            $positionId = $this->service->getModelId($request->input('id'));

        } catch (\Exception $e) {
            throw new \Exception('Not found employee' . $e->getMessage());
        }

        $params = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'hire_date' => $request->input('hire_date'),
            'department_id' => $departmentId,
            'position_id' => $positionId,
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
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
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
    public function destroy(int $id)
    {
        $this->service->deleteEmployee($id);

        return EmployeeResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Employee deleted!'
        ]);
    }
}
