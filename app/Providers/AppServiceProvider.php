<?php

namespace App\Providers;

use App\Services\DepartmentHeadService;
use App\Services\DepartmentHeadServiceInterface;
use App\Services\DepartmentService;
use App\Services\DepartmentServiceInterface;
use App\Services\EmployeeSalaryService;
use App\Services\EmployeeSalaryServiceInterface;
use App\Services\EmployeeService;
use App\Services\EmployeeServiceInterface;
use App\Services\PositionService;
use App\Services\PositionServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmployeeServiceInterface::class, EmployeeService::class);
        $this->app->bind(DepartmentServiceInterface::class, DepartmentService::class);
        $this->app->bind(PositionServiceInterface::class, PositionService::class);
        $this->app->bind(EmployeeSalaryServiceInterface::class, EmployeeSalaryService::class);
        $this->app->bind(DepartmentHeadServiceInterface::class, DepartmentHeadService::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
