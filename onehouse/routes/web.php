<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/chart', function () {
    return view('chart');
});

Route::get('/calendar', function () {
    return view('calendar');
});
