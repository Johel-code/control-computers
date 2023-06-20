<?php

namespace App\Providers;

use App\Models\Bitacora;
use App\Models\Computer;
use App\Observers\BitacoraObserver;
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
        Computer::observe(BitacoraObserver::class);
    }
}
