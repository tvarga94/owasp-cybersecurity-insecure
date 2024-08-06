<?php

declare(strict_types=1);

namespace App\Providers;

use App\Clients\NasaApiClient;
use App\Interfaces\AdminRepositoryInterface;
use App\Interfaces\NasaApiRepositoryInterface;
use App\Repositories\AdminRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(NasaApiRepositoryInterface::class, NasaApiClient::class);
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);

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
