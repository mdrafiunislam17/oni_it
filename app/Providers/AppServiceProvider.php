<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        // Global categories for header (ALL pages same data)
        View::composer('frontend.layouts.header', function ($view) {

            $categories = Category::query()->where('activity', 1)
                ->where('status', 1)
                ->where('front_view', '!=', 0)
                ->orderBy('id', 'asc')
                ->skip(0)
                ->take(4)
                ->get();

            $view->with('categories', $categories);
        });
    }
}
