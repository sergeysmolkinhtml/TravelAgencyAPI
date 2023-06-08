<?php


use App\Http\Controllers\API\V1\TravelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('travels',[TravelController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
