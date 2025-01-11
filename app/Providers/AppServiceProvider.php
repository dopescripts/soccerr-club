<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Navlinks;

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
        $navlinks = Navlinks::where('status', 'enabled')->get();
        view()->share('navlinks', $navlinks);
    }
}
