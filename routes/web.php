<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/create/Article', [ArticleController::class, 'create'])->name('create.article');
Route::get('/articles/index', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/categories/{category}', [ArticleController::class, 'byCategory'])->name('bycategory');