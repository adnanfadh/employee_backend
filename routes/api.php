<?php

use App\Http\Controllers\Api\DivisionController;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\PositionController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/employees', EmployeeController::class);
Route::get('/position', [PositionController::class, 'index']);
Route::get('/division', [DivisionController::class, 'index']);
