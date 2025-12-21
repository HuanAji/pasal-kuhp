<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PasalController;
use App\Models\Banner;
use Illuminate\Support\Facades\Route;


Route::get('/', [LandingController::class, 'index'])->name('landing');

// (debug routes removed)

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/category/{slug}', [NewsController::class, 'category'])->name('news.category');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/author/{username}', [AuthorController::class, 'show'])->name('author.show');
Route::get('/pasal', [PasalController::class, 'index'])->name('pasal.index');