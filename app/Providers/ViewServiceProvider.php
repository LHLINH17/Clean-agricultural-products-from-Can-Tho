<?php

namespace App\Providers;

use App\Http\View\Composer\MenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ...
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('header', MenuComposer::class);
    }
}
