<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\NeighbourhoodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('register', 'register');
    Route::post('logout', 'logout')->name('logout');
    Route::post('refresh', 'refresh');
});

Route::controller(CityController::class)->middleware("auth:api")->group(function () {
    Route::get('city', 'index');
    Route::post('city', 'create');
    Route::get('city/{id}', 'read');
    Route::put('city/{id}', 'update');
    Route::delete('city/{id}', 'delete');
}); 

Route::controller(NeighbourhoodController::class)->middleware("auth:api")->group(function () {
    Route::get('neighbourhood', 'index');
    Route::post('neighbourhood', 'create');
    Route::get('neighbourhood/{id}', 'read');
    Route::put('neighbourhood/{id}', 'update');
    Route::delete('neighbourhood/{id}', 'delete');
}); 