<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\FoodController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\TableController;
use App\Http\Controllers\Dashboard\AdminController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware'=>['auth:admin'],
    'prefix'=>'admin/',
],function(){
    route::get('/',[DashboardController::class,'index'])->name('dashboard');

    route::resource('/categories',CategoryController::class)
        ->name('index','categories');

    route::resource('/foods',FoodController::class)
        ->name('index','foods');

    route::resource('/tables',TableController::class)
        ->name('index','tables');

    route::resource('/roles',RolesController::class)
        ->name('index','roles');

    Route::resource('/admins', AdminController::class)
        ->name('index','admins');
});
