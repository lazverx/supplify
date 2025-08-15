<?php

namespace App\Providers;

use App\Models\CartItem;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


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
        View::composer('layouts.partials.nav-pembeli', function ($view) {
        if (auth()->check()) {
            $totalCart = CartItem::where('user_id', auth()->id())->count();
            $view->with('totalCart', $totalCart);
        } else {
            $view->with('totalCart', 0);
        }
    });
    }
}
