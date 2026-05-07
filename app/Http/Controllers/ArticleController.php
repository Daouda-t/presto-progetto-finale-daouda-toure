<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Models\Article;
use App\Models\Category;


class ArticleController extends Controller implements HasMiddleware
{
public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['create']),

        ];
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

        public function index()
        {
            $articles = Article::orderBy('created_at', 'desc')->paginate(6);
            return view('articles.index', compact('articles'));
        }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()->get();
        return view('articles.byCategory', ['articles' => $category->articles, 'category' => $category]);
    }


    public function create()
    {
       return view('articles.create');
    }
   



}