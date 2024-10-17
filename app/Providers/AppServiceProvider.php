<?php

namespace App\Providers;

use App\Contracts\FakeApiInterface;
use App\Services\PlatziService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FakeApiInterface::class, PlatziService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
