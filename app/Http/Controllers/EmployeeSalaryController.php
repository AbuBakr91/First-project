<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\EmployeeSalaryHelper;
use App\Services\EmployeeSalaryResponseHelper;
use App\Services\EmployeeSalaryService;
use App\Services\EmployeeSalaryServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    protected EmployeeSalaryService $service;

    public function __construct(EmployeeSalaryServiceInterface $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return $this->service->getEmployeeSalary();

    }

    /**
     * Store a newly created resource in storage.
     * @throws Exception
     */
    public function store(Request $request): JsonResponse
    {
        $params = EmployeeSalaryHelper::prepareData($request);

        try {
            $this->service->addNewEmployeeSalary($params);

        } catch (Exception $e) {
            throw new Exception('Ошибка при добавлении данных о зарплате' . $e->getMessage());
        }

        return EmployeeSalaryResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Добавлены данные о зарплате!'
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @throws Exception
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $this->service->editEmployeeSalary($request, $id);

        } catch (Exception $e) {
            throw new Exception('Ошибка при обновлении данных о зарплате' . $e->getMessage());
        }

        return EmployeeSalaryResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Данные о зарплате обновлены!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @throws Exception
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $this->service->deleteEmployeeSalary($id);

        } catch (Exception $e) {
            throw new Exception('Ошибка при удалении данных о зарплате' . $e->getMessage());
        }

        return EmployeeSalaryResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Данные о зарплате удалены!'
        ]);
    }
}
