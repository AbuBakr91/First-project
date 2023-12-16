<?php

namespace App\Providers;

use App\Services\DepartmentService;
use App\Services\DepartmentServiceInterface;
use App\Services\EmployeeService;
use App\Services\EmployeeServiceInterface;
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

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
