<?php

use Illuminate\Support\Facades\Route;
use App\Book\Controllers\BookController;
use App\Author\Controllers\AuthorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('books')->middleware(['auth:sanctum'])->name('books.')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('index');
    Route::post('/', [BookController::class, 'store'])->name('store');

    Route::prefix('{book}')->group(function () {
        Route::post('/set-owner', [BookController::class, 'setOwner'])->name('set-owner');
        Route::delete('/destroy', [BookController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('authors')->middleware(['auth:sanctum'])->name('authors.')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('list');
});
