<?php

namespace App\Providers;

use App\Services\EmployeeInterface;
use App\Services\EmployeeService;
use App\Services\DepartmentInterface;
use App\Services\DepartmentService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmployeeInterface::class, EmployeeService::class);

        $this->app->bind(DepartmentInterface::class, DepartmentService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
