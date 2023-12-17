<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\PositionHelper;
use App\Services\PositionResponseHelper;
use App\Services\PositionService;
use App\Services\PositionServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    protected PositionService $service;

    public function __construct(PositionServiceInterface $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index():Collection
    {
        return $this->service->getPosition();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Exception
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $params = PositionHelper::prepareData($request);

        try {
            $this->service->addNewPosition($params);

        } catch (Exception $e) {
            throw new Exception('Ошибка при добавлении данных о новой должности' . $e->getMessage());
        }

        return PositionResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Добавлены данные о новой должности!'
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @throws Exception
     */
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->service->editPosition($request, $id);

        } catch (Exception $e) {
            throw new Exception('Ошибка при обновлении данных о должности' . $e->getMessage());
        }

        return PositionResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Данные о должности обновлены!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @throws Exception
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->service->deletePosition($id);

        } catch (Exception $e) {
            throw new Exception('Ошибка при удалении данных о должности' . $e->getMessage());
        }

        return PositionResponseHelper::createResponse([
            'status' => 200,
            'message' => 'Данные о должности удалены!'
        ]);
    }
}
