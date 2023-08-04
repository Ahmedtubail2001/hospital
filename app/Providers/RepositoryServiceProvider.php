<?php

namespace App\Providers;

use App\Interface\Section\SectionRepositoryInterface;
use App\Repository\Section\SectionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}