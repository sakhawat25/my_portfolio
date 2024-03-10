<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // Share authenticated user with every view
        View::composer('*', function ($view) {
            // Retrieve authenticated user
            $user = auth()->user();

            // Pass authenticated user to the view
            $view->with('user', $user);
        });
    }
}
