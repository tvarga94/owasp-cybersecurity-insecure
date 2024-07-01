<?php

namespace App\Providers;

use App\Clients\NasaApiClient;
use App\Interfaces\NasaApiRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(NasaApiRepositoryInterface::class, NasaApiClient::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
