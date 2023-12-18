<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentHeadController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeSalaryController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


    Route::controller(EmployeeController::class)->group(function () {
        Route::get('employee', 'index');
        Route::post('employee', 'store');
        Route::patch('employee/{id}', 'update');
        Route::delete('employee/{id}', 'destroy');
    });

    Route::controller(DepartmentController::class)->group(function() {
        Route::get('department', 'index');
        Route::post('department', 'store');
        Route::patch('department/{id}', 'update');
        Route::delete('department/{id}', 'destroy');
    });

    Route::controller(PositionController::class)->group(function() {
        Route::get('position', 'index');
        Route::post('position', 'store');
        Route::patch('position/{id}', 'update');
        Route::delete('position/{id}', 'destroy');
    });

    Route::controller(EmployeeSalaryController::class)->group(function () {
        Route::get('employee_salary', 'index');
        Route::post('employee_salary', 'store');
        Route::patch('employee_salary/{id}', 'update');
        Route::delete('employee_salary/{id}', 'destroy');
    });

    Route::controller(DepartmentHeadController::class)->group(function() {
        Route::get('department_head', 'index');
        Route::post('department_head', 'store');
        Route::patch('department_head/{id}', 'update');
        Route::delete('department_head/{id}', 'destroy');
    });
