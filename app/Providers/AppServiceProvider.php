<?php

namespace App\Providers;

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
