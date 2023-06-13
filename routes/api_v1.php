<?php


use App\Http\Controllers\API\V1\Auth\LoginController;
use App\Http\Controllers\API\V1\TourController;
use App\Http\Controllers\API\V1\TravelController;
use Illuminate\Support\Facades\Route;


Route::get('travels', [TravelController::class, 'index']);
Route::get('travels/{travel:slug}/tours', [TourController::class, 'index']);

Route::prefix('admin')->middleware(['auth:sanctum','role:admin'])->group(function () {
    Route::post('travels', [App\Http\Controllers\API\V1\Admin\TravelController::class, 'store']);
    Route::post('travels/{travel}/tours', [App\Http\Controllers\API\V1\Admin\TourController::class, 'store']);

});

Route::post('login', LoginController::class);
