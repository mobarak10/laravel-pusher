<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;

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

        Str::macro('formatString', function ($value) {
            $words = explode('_', $value);
            $formatted = '';

            foreach ($words as $word) {
                $formatted .= ucfirst($word) . ' ';
            }

            return trim($formatted);
        });
    }
}
