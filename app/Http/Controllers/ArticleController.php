<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Controllers\Middleware;
use Illuminate\Foundation\Controllers\HasMiddleware;

class ArticleController extends Controller implements HasMiddleware
{
public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['create']),

        ];
    }


    public function create()
    {
        return view('articles.create');
    }
}
