<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\DepartmentHeadHelper;
use App\Services\DepartmentHeadResponseHelper;
use App\Services\DepartmentHeadService;
use App\Services\DepartmentHeadServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DepartmentHeadController extends Controller
{
    protected DepartmentHeadService $service;

    public function __construct(DepartmentHeadServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return $this->service->getDepartmentHead();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Exception
     */
    public function store(Request $request): JsonResponse
    {
        $params = DepartmentHeadHelper::prepareData($request);

        try {
            $this->service->addNewDepartmentHead($params);

        } catch (Exception $e) {
            throw new Exception('Ошибка при добавлении данных о начальнике отдела' . $e->getMessage());
        }

        return DepartmentHeadResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Добавлены данные о начальнике отдела!'
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @throws Exception
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $this->service->editDepartmentHead($request, $id);

        } catch (Exception $e) {
            throw new Exception('Ошибка при обновлении данных о начальнике отдела' . $e->getMessage());
        }

        return DepartmentHeadResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Данные о начальнике отдела обновлены!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @throws Exception
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $this->service->deleteDepartmentHead($id);

        } catch (Exception $e) {
            throw new Exception('Ошибка при удалении данных о начальнике отдела' . $e->getMessage());
        }

        return DepartmentHeadResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Данные о начальнике отдела удалены!'
        ]);
    }
}
