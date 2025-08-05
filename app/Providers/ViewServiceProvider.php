<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Services; 

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $services = \Illuminate\Support\Facades\Cache::remember('services', 3600, function () {
                return \App\Models\Services::all();
            });
            
            $view->with('services', $services);
        });

    }
}
