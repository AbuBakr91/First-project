<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
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
