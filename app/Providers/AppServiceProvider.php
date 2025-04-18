<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
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
        Paginator::useBootstrapFive();

        if (!app()->runningInConsole() && Schema::hasTable('navlinks')) {
            try {
                $navlinks = Navlinks::where('status', 'enabled')->get();
                view()->share('navlinks', $navlinks);
            } catch (\Throwable $e) {
                report($e); // Optional: logs the error without breaking the app
            }
        }
    }
}
