<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BusinessInfoController;
use App\Http\Controllers\Uddesign\UddesignController;
use App\Http\Controllers\KuwagoOne\Kuwago_OneController;
use App\Http\Controllers\KuwagoTwo\Kuwago_TwoController;

Route::get('/', function () {
    return view('auth.login');
})->middleware('redirectIfAuthenticated')->name('login');

Route::get('/kuwago-one', function () {
    return view('general.kuwago-one.dashboard');
})->middleware(['auth', 'verified'])->name('general.kuwago-one.dashboard');

Route::middleware(['auth', 'kuwagoRole:owner,general,kuwago'])->group(function () {
    Route::get('/kuwago-one', [Kuwago_OneController::class, 'general_kuwago_one'])->name('general.kuwago-one.dashboard');
    Route::get('/kuwago-one/expenses', [Kuwago_OneController::class, 'chart_expenses_kuwago_one'])->name('general.kuwago-one.expenses');
    Route::get('/kuwago-one/sales', [Kuwago_OneController::class, 'chart_sales_kuwago_one'])->name('general.kuwago-one.sales');

    Route::get('/kuwago-two', [Kuwago_TwoController::class, 'general_kuwago_two'])->name('general.kuwago-two.dashboard');
    Route::get('/kuwago-two/expenses', [Kuwago_TwoController::class, 'chart_expenses_kuwago_two'])->name('general.kuwago-two.expenses');
    Route::get('/kuwago-two/sales', [Kuwago_TwoController::class, 'chart_sales_kuwago_two'])->name('general.kuwago-two.sales');
});

Route::middleware(['auth', 'uddesignRole:owner,general,uddesign'])->group(function () {
    Route::get('/uddesign', [UddesignController::class, 'general_uddesign'])->name('general.uddesign.dashboard');
    Route::get('/uddesign/expenses', [UddesignController::class, 'chart_expenses_uddesign'])->name('general.uddesign.expenses');
    Route::get('/uddesign/sales', [UddesignController::class, 'chart_sales_uddesign'])->name('general.uddesign.sales');
});

Route::middleware('auth')->group(function () {
    Route::get('/account/password', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/account/password', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/account/password', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/business', BusinessInfoController::class);
});

Route::middleware(['auth', 'role:owner'])->group(function(){
    Route::resource('/account', AccountController::class);
});


require __DIR__.'/auth.php';
