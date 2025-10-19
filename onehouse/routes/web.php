<?php

use App\Http\Controllers\LoanSimulationController;
use App\Http\Controllers\MakerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\MakerFeature;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.index');
});


// データベース確認画面--------------------------------------
// Route::get('/default',[UserController::class, 'index']);
// Route::get('/default',[ProfileController::class, 'index']);
// Route::get('/default',[MakerController::class, 'index']);
Route::get('/default',[LoanSimulationController::class, 'index']);

// phase1~5------------------------------------------
Route::get('/phase1', function () {
    return view('phase1');
});

Route::get('/phase2', function () {
    return view('phase2');
});
Route::get('/phase2-edit', function () {
    return view('phase2_edit');
});
Route::get('/phase2-update', function () {
    return view('phase2_update');
});

Route::get('/phase3', function () {
    return view('phase3');
});

Route::get('/phase4', function () {
    return view('phase4');
});

Route::get('/phase5', function () {
    return view('phase5');
});

// navigate-----------------------------------------
