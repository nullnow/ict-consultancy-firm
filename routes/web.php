<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthWebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - OPES Technologies Ecosystem
|--------------------------------------------------------------------------
*/

// Front Facing Application Matrix
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

// Service Domain Structures
Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
    Route::get('/', [PageController::class, 'services'])->name('index');
    Route::get('/{slug}', [PageController::class, 'showService'])->name('show');
});

// Lead Generation Capture Inbound Pipeline
Route::post('/request-demo', [InquiryController::class, 'store'])->name('inquiry.store');

/*
|--------------------------------------------------------------------------
| Administrative Authentication Gateways
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AuthWebController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthWebController::class, 'login'])->name('login.authenticate');
    Route::post('/logout', [AuthWebController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Authenticated Structural Control Console (Dashboard)
|--------------------------------------------------------------------------
|
| Protected by the 'auth' middleware. These routes handle real-time
| content adjustments, core service parameters, and inquiry tracking.
|
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Existing Dashboard Map Core
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Service Management Channels
    Route::get('/services/create', [DashboardController::class, 'createService'])->name('services.create');
    Route::post('/services', [DashboardController::class, 'storeService'])->name('services.store');
    Route::get('/services/{service}/edit', [DashboardController::class, 'editService'])->name('services.edit');
    Route::put('/services/{service}', [DashboardController::class, 'updateService'])->name('services.update');

    // Auxiliary Strategic Feature Additions
    Route::post('/services/{service}/features', [DashboardController::class, 'storeFeature'])->name('features.store');
    Route::delete('/features/{feature}', [DashboardController::class, 'destroyFeature'])->name('features.destroy');

    // Use Case ("Work") Execution Vectors
    Route::get('/use-cases/create', [DashboardController::class, 'createUseCase'])->name('use_cases.create');
    Route::post('/use-cases', [DashboardController::class, 'storeUseCase'])->name('use_cases.store');
    Route::get('/use-cases/{useCase}/edit', [DashboardController::class, 'editUseCase'])->name('use_cases.edit');
    Route::put('/use-cases/{useCase}', [DashboardController::class, 'updateUseCase'])->name('use_cases.update');
    Route::delete('/use-cases/{useCase}', [DashboardController::class, 'destroyUseCase'])->name('use_cases.destroy');

    // Lead Pipeline Tracking Vectors
    Route::get('/inquiries/{inquiry}', [DashboardController::class, 'showInquiry'])->name('inquiries.show');
    Route::patch('/inquiries/{inquiry}/status', [DashboardController::class, 'updateInquiryStatus'])->name('inquiries.update_status');
});
