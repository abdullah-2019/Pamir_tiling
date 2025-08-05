<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Services;
use App\Models\About;

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
        View::composer('*', function ($view) {
            $services = Cache::remember('services', 3600, function () {
                return Services::all();
            });
            
            $about = Cache::remember('about', 3600, function () {
                return About::first();
            });
            
            $view->with([
                'services' => $services,
                'about' => $about
            ]);
        });
    }
}
