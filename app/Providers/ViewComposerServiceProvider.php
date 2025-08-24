<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Contact;

class ViewComposerServiceProvider extends ServiceProvider
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
     // app/Providers/ViewComposerServiceProvider.php
    public function boot()
    {
        View::composer('layouts.nav', function ($view) {
            $unreadMessagesCount = Contact::where('status', false)->count();
            $view->with('unreadMessagesCount', $unreadMessagesCount);
        });
    }
}
