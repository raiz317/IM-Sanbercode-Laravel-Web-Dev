<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\IsAdmin;

Route::get('/', [DashboardController::class, 'home']);
Route::get('/register', [FormController::class, 'form']);
Route::post('/welcome', [FormController::class, 'welcome']);

Route::middleware(['auth', IsAdmin::class])->group(function () {

    Route::get('/genre/create', [GenreController::class, 'create']);
    Route::post('/genre', [GenreController::class, 'store']); 

    Route::get('/genre/{id}/edit', [GenreController::class, 'edit'])->name('genre.edit');
    Route::put('/genre/{id}', [GenreController::class, 'update'])->name('genre.update');

    Route::delete('/genre/{id}', [GenreController::class, 'destroy']);

});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/profile', [AuthController::class, 'getprofile'])->middleware('auth');
Route::post('/profile', [AuthController::class, 'createprofile'])->middleware('auth');
Route::put('/profile/{id}', [AuthController::class, 'updateprofile'])->middleware('auth');

Route::post('/comments/{books_id}', [CommentController::class, 'store'])->middleware('auth');
// Route::get('/books/{id}', [BookController::class, 'show']);

// Route::post('/comments/{books_id}', [CommentController::class, 'store'])->middleware('auth');
// Route::get('/books/{id}', [BookController::class, 'show']);

Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/{id}', [GenreController::class, 'show']);

Route::resource('books', BooksController::class);

Route::get('/register', [AuthController::class, 'showregister']);
Route::post('/register', [AuthController::class, 'registeruser']);

Route::get('/login', [AuthController::class, 'showlogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

