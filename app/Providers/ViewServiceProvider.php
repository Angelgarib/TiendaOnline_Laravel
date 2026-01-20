<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Offer;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('partials.navigation', function ($view) {
            $view->with([
                'navCategories' => Category::orderBy('name')->get(),
                'navOffers' => Offer::where('active', true)->orderBy('name')->get(),
            ]);
        });
    }
}

