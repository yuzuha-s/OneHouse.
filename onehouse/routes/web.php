<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.index');
});

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


Route::get('/chart', function () {
    return view('chart');
});


Route::get('/phase5', function () {
    return view('phase5');
});

// navigate-----------------------------------------
Route::get('/calendar', function () {
    return view('calendar');
});
