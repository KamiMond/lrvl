<?php

namespace App\Providers;

use App\Services\Interfaces\Parser;
use App\Services\Interfaces\ParserInterface;
use App\Services\Interfaces\Social;
use App\Services\Interfaces\SocialInterface;
use App\Services\ParserService;
use App\Services\SocialService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ParserInterface::class, ParserService::class);
        $this->app->bind(SocialInterface::class, SocialService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
