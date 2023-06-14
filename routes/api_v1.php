<?php

use App\Http\Controllers\API\V1\Auth\LoginController;
use App\Http\Controllers\API\V1\TourController;
use App\Http\Controllers\API\V1\TravelController;
use Illuminate\Support\Facades\Route;

Route::get('travels', [TravelController::class, 'index']);
Route::get('travels/{travel:slug}/tours', [TourController::class, 'index']);

Route::prefix('admin')->middleware(['auth:sanctum'])->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::post('travels', [App\Http\Controllers\API\V1\Admin\TravelController::class, 'store']);
        Route::post('travels/{travel}/tours', [App\Http\Controllers\API\V1\Admin\TourController::class, 'store']);
    });
    Route::put('travels/{travel}', [App\Http\Controllers\API\V1\Admin\TravelController::class, 'update']);
});

Route::post('login', LoginController::class);
