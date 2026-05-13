<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/create/Article', [ArticleController::class, 'create'])->name('create.article');
Route::get('/articles/index', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/categories/{category}', [ArticleController::class, 'byCategory'])->name('bycategory');
Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor;');
Route::get('/make/revisor{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');





