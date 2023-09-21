<?php

use App\Http\Controllers\Api\AccessTokensController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\TableController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::delete('auth/access-tokens/{token?}',[AccessTokensController::class,'destroy'])
    ->middleware('auth:sanctum');

Route::post('auth/access-tokens',[AccessTokensController::class,'store'])
    ->middleware('guest:sanctum');

Route::apiResource('categories',CategoryController::class);

Route::apiResource('foods',FoodController::class);

Route::apiResource('tables',TableController::class);

Route::apiResource('bookings',BookingController::class);

Route::apiResource('admins',AdminController::class);

Route::apiResource('roles',RoleController::class);

