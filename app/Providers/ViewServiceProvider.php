<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
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
        // Every time layouts.app is rendered, bind cartCount
        View::composer('Layouts.app', function ($view) {
            $user = Auth::user();
            $cartCount = 0;

            if ($user) {
                // Assumes User model has a cart() relationship
                $cartCount = $user->cart()->count();
            }

            $view->with('cartCount', $cartCount);
        });
    }
}
