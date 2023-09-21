<?php

namespace App\Providers;

use App\Http\Controllers\Interfaces\Dashboard\AdminServiceInterface;
use App\Http\Controllers\Interfaces\Dashboard\CategoryServiceInterface;
use App\Http\Controllers\Interfaces\Dashboard\FoodServiceInterface;
use App\Http\Controllers\Interfaces\Dashboard\TableServiceInterface;
use App\Http\Controllers\Interfaces\Front\BookingServiceInterface;
use App\Http\Controllers\Interfaces\Front\CartServiceInterface;
use App\Http\Controllers\Services\Dashboard\AdminService;
use App\Http\Controllers\Services\Dashboard\CategoryService;
use App\Http\Controllers\Services\Dashboard\FoodService;
use App\Http\Controllers\Services\Dashboard\TableService;
use App\Http\Controllers\Services\Front\BookingService;
use App\Http\Controllers\Services\Front\CartService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryServiceInterface::class,CategoryService::class);
        $this->app->bind(FoodServiceInterface::class,FoodService::class);
        $this->app->bind(TableServiceInterface::class,TableService::class);
        $this->app->bind(CartServiceInterface::class,CartService::class);
        $this->app->bind(BookingServiceInterface::class,BookingService::class);
        $this->app->bind(AdminServiceInterface::class,AdminService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Paginator::useBootstrap();
    }
}
