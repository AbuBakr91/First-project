<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\EmployeeInterface;
use App\Services\EmployeeResponseHelper;
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
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->service->getEmployee();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Exception
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $params = EmployeeHelper::prepareData($request);

        try {
            $this->service->addNewEmployee($params);

        } catch (Exception $e) {
            throw new Exception('Ошибка при добавлении нового сотрудника' . $e->getMessage());
        }

        return EmployeeResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Сотрудник добавлен!'
        ]);
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
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $this->service->deleteEmployee($id);

        return EmployeeResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Employee deleted!'
        ]);
    }
}
