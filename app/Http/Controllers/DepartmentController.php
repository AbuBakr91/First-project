<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\DepartmentServiceInterface;
use App\Services\DepartmentResponseHelper;
use App\Services\DepartmentService;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected DepartmentService $service;

    public function __construct(DepartmentServiceInterface $service)
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
     * @throws Exception
     */

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $this->service->addNewDepartment($request->input('name'));

        } catch (Exception $e) {
            throw new Exception('Ошибка при добавлении нового отдела' . $e->getMessage());
        }

        return DepartmentResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Отдел добавлен!'
        ]);
    }

    /**
     * Display the specified resource.
     * @throws Exception
     */

    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->service->editDepartment($request, $id);

        } catch (Exception $e) {
            throw new Exception('Ошибка при добавлении нового отдела' . $e->getMessage());
        }

        return DepartmentResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Название отдела обновлено!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @throws Exception
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->service->deleteDepartment($id);

        } catch (Exception $e) {
            throw new Exception('Ошибка при удалении данных об отделе' . $e->getMessage());
        }

        return DepartmentResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Данные об отделе удалены!'
        ]);
    }
}
