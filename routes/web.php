<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChartDataController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [RoleController::class, 'admin_dashboard'])->name('admin.dashboard');
    Route::resource('/admin/account', AccountController::class);
    Route::resource('dashboard-main', ChartDataController::class);
});

Route::middleware(['auth', 'role:kuwago_one'])->group(function () {
    Route::get('/kuwago_one/dashboard', [RoleController::class, 'kuwago_one_dashboard'])->name('kuwago_one.dashboard');
});

Route::middleware(['auth', 'role:kuwago_two'])->group(function () {
    Route::get('/kuwago_two/dashboard', [RoleController::class, 'kuwago_two_dashboard'])->name('kuwago_two.dashboard');
});

Route::middleware(['auth', 'role:uddesign'])->group(function () {
    Route::get('/uddesign/dashboard', [RoleController::class, 'uddesign_dashboard'])->name('uddesign.dashboard');
});

require __DIR__.'/auth.php';
