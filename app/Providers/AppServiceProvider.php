<?php

namespace App\Providers;


use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        
        if (Schema::hasTable('categories')) {
            FacadesView::share('categories', Category::all());
        }
        Paginator::useBootstrapFive();
        
        
    }
}
