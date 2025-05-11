<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;

Route::get('/', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::post('/books/{bookId}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/contact', [BookController::class, 'contact']);
Route::get('/service', [BookController::class, 'service']);
Route::get('/about', [BookController::class, 'about']);
Route::get('/services', [BookController::class, 'services'])->name('services');
Route::resource('books', BookController::class);
Route::put('/books/{book}', [BookController::class, 'update']);
