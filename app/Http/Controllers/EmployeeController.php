<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\EmployeeHelper;
use App\Services\EmployeeServiceInterface;
use App\Services\EmployeeResponseHelper;
use App\Services\EmployeeService;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected EmployeeService $service;

    public function __construct(EmployeeServiceInterface $service)
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
     * Store a newly created resource in storage.
     * @throws Exception
     */
    public function store(Request $request): JsonResponse
    {
        $params = EmployeeHelper::prepareData($request);

        try {
            $this->service->addNewEmployee($params);

        } catch (Exception $e) {
            throw new Exception('Ошибка при добавлении нового сотрудника' . $e->getMessage());
        }

        return EmployeeResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Добавлен новый сотрудник!'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $this->service->editEmployee($request, $id);

        } catch (Exception $e) {
            throw new Exception('Ошибка при обновлении данных о сотруднике' . $e->getMessage());
        }

        return EmployeeResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Данные о сотруднике обновлены!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->service->deleteEmployee($id);

        } catch (Exception $e) {
            throw new Exception('Ошибка при удалении данных о сотруднике' . $e->getMessage());
        }

        return EmployeeResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Данные о сотруднике удалены!'
        ]);
    }
}
