<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        // Condividi le categorie con tutte le viste
        View::composer('*', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });
    

}
}
