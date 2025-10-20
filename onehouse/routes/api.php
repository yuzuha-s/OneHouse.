<?php

use App\Http\Controllers\LoanSimulationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::put('/phase3/{profile_id}', [LoanSimulationController::class, 'update']);
