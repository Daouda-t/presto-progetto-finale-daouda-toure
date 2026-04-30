<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/create/Article', [ArticleController::class, 'create'])->name('create.article');
Route::get('/login', function () {
 return view('auth.login');
})->name('login');