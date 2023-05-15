<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Dashboard 
        $this->app->singleton(
            \App\Services\Interface\IDashboardService::class,
            \App\Services\Impl\DashboardService::class
        );

        // User 
        $this->app->singleton(
            \App\Services\Interface\IUserService::class,
            \App\Services\Impl\UserService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
