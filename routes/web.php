<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainIndexController;
use App\Http\Controllers\UserAccounts;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;

Route::middleware(['auth'])->group(function () {

    // create project form
    Route::get('/projects/create', [ProjectController::class, 'create'])
        ->name('projects.create');

    // store project
    Route::post('/projects/store', [ProjectController::class, 'store'])
        ->name('projects.store');

    // open project (VS Code editor page)
    Route::get('/projects/{id}', [ProjectController::class, 'show'])
        ->name('projects.show');
});
Route::get('/', [MainIndexController::class, 'index']);
Route::get('/create-account', function () {
    return view('auth.create_account');
})->name('create.account');

Route::post('/register', [UserAccounts::class, 'register'])->name('register');
Route::post('/login', [UserAccounts::class, 'login'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');