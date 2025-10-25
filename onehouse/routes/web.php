<?php

use App\Http\Controllers\CheckListController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\LandLogController;
use App\Http\Controllers\LoanSimulationController;
use App\Http\Controllers\MakerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Maker;
use App\Models\MakerFeature;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.index');
});


// データベース確認画面--------------------------------------
// Route::get('/default',[UserController::class, 'index']);
// Route::get('/default',[ProfileController::class, 'index']);
// Route::get('/default',[LoanSimulationController::class, 'index']);
// Route::get('/default',[LandLogController::class, 'index']);
Route::get('/default',[MakerController::class, 'index']);
// Route::get('/default',[CheckListController::class, 'index']);

// phase1~5------------------------------------------
Route::get('/phase1', function () {
    return view('phase1');
});

Route::get('/phase2', function () {
    return view('phase2');
});

// 住宅メーカー一覧表示
Route::get('/phase2',[MakerController::class, 'index']);
Route::get('/phase2',[MakerController::class, 'index'])->name('phase2');

// 新規メーカー追加画面
Route::get('/phase2-edit',[MakerController::class, 'create'])->name('create');

// 新規メーカーを保存する
Route::post('/phase2-edit',[MakerController::class, 'store'])->name('store');

// 登録メーカー情報編集画面を表示する
Route::get('/phase2-update/{id}', [MakerController::class, 'edit'])->name('edit');

// 登録メーカー情報を変更する
Route::post('/phase2-update/{id}',[MakerController::class, 'update'])->name('update');

Route::delete('/phase2/{id}',[MakerController::class, 'destroy'])->name('destroy');

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
