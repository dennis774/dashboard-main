<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BusinessInfoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChartDataController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalesController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/account/password', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/account/password', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/account/password', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/business', BusinessInfoController::class);

    

    Route::middleware(['auth', 'role:owner'])->group(function(){
        Route::get('/admin/dashboard', [RoleController::class, 'admin_dashboard'])->name('roles.admin.dashboard');
        Route::get('/admin/dashboard', [ChartDataController::class, 'index'])->name('roles.admin.dashboard');
        // Route::post('/admin/dashboard', [ChartDataController::class, 'index_chart'])->name('admin.dashboard');
    
        Route::get('/admin/expenses', [PageController::class, 'expenses_index'])->name('pages.Expenses.index');
        Route::get('/admin/feedbacks', [PageController::class, 'feedback_index'])->name('pages.Feedbacks.index');
        Route::get('/admin/promos', [PageController::class, 'promo_index'])->name('pages.Promos.index');
        Route::get('/admin/sales', [PageController::class, 'sales_index'])->name('pages.Sales.index');

        Route::get('/admin/sales', [SalesController::class, 'chart_sales_index'])->name('pages.Sales.index');

        Route::resource('/account', AccountController::class);
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
});

require __DIR__.'/auth.php';
