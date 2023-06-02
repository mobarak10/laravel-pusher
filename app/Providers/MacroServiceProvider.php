<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
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
        Vite::macro('image', fn (string $asset) => $this->asset("resources/template/assets/images/{$asset}"));
        Vite::macro('icon', fn (string $asset) => $this->asset("resources/template/assets/icons/{$asset}"));
    }
}
