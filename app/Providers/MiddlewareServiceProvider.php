<?php

namespace App\Providers;

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\ServiceProvider;

class MiddlewareServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register the middleware here
        $this->app['router']->aliasMiddleware('admin', IsAdmin::class);
    }

    public function boot()
    {
        //
    }
}
