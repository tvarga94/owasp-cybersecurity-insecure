<?php

namespace App\Providers;

use App\Http\Clients\NasaApiClient;
use App\Http\Interfaces\NasaApiClientInterface;
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
        $this->app->bind(NasaApiClientInterface::class, NasaApiClient::class);
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
