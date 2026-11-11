<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectPdfController;

Route::get('/', [PortfolioController::class, 'index'])->name('home');

Route::get('/projects', [PortfolioController::class, 'projects'])
    ->name('projects');

Route::get('/projects/{slug}', [PortfolioController::class, 'show'])
    ->name('projects.show');

// Login Admin
Route::get('/admin/login', [AuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AuthController::class, 'login'])
    ->name('admin.login.submit');

// Halaman Admin yang dilindungi login
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', function () {
        $totalProjects = \App\Models\Project::count();

        $projects = \App\Models\Project::latest()
            ->take(6)
            ->get();

        return view('admin.dashboard', compact(
            'totalProjects',
            'projects'
        ));
    })->name('dashboard');

    // Export Laporan Project ke PDF
    Route::get('/projects/export/pdf', [ProjectPdfController::class, 'export'])
        ->name('projects.export.pdf');

    // CRUD Project
    Route::resource('/projects', ProjectController::class);

    // Logout Admin
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
