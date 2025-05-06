<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;

Route::get('/', [DashboardController::class, 'home']);
Route::get('/register', [FormController::class, 'form']);
Route::post('/welcome', [FormController::class, 'welcome']);
