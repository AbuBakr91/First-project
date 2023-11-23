<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\EmployeeInterface;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class Employee extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = [
            'id_departament' => $request->input('id_departament'),
            'id_post' => $request->input('id_post'),
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'date' => $request->input('date'),
        ];

        $this->service->addNewEmployee($params);
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
    public function update(Request $request, int $id)
    {
        $this->service->editEmployee($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): void
    {
        $this->service->deleteEmployee($id);
    }
}
