<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartDataController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('dashboard-main', ChartDataController::class);