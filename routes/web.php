<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;

Route::get('/', [ProjectController::class, 'index']);
Route::post('/project', [ProjectController::class, 'store']);
Route::get('/project/{id}', [ProjectController::class, 'open']);
Route::post('/save', [ProjectController::class, 'save']);
