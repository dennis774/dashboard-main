<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BusinessInfoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChartDataController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:owner'])->group(function(){
    Route::get('/admin/dashboard', [RoleController::class, 'admin_dashboard'])->name('admin.dashboard');
    Route::resource('/admin/account', AccountController::class);
    Route::get('/admin/dashboard', [ChartDataController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/expenses', [PageController::class, 'expenses_index'])->name('pages.Expenses.index');
    Route::get('/admin/feedbacks', [PageController::class, 'feedback_index'])->name('pages.Feedbacks.index');
    Route::get('/admin/promos', [PageController::class, 'promo_index'])->name('pages.Promos.index');
    Route::get('/admin/sales', [PageController::class, 'sales_index'])->name('pages.Sales.index');

    Route::resource('/admin/business', BusinessInfoController::class);

});

Route::middleware(['auth', 'role:general'])->group(function () {
    Route::get('/general/dashboard', [RoleController::class, 'general_dashboard'])->name('generaldashboard.dashboard');
});

Route::middleware(['auth', 'role:kuwago'])->group(function () {
    Route::get('/kuwago/dashboard', [RoleController::class, 'kuwago_dashboard'])->name('kuwago.dashboard');
});

Route::middleware(['auth', 'role:uddesign'])->group(function () {
    Route::get('/uddesign/dashboard', [RoleController::class, 'uddesign_dashboard'])->name('uddesign.dashboard');
});


require __DIR__.'/auth.php';
