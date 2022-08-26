<?php

namespace App\Providers;

use App\Services\MakeRequestToApiService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MakeRequestToApiService::class, function () {
            return new MakeRequestToApiService(
                config('services.webservice.api-url'),
                config('services.webservice.retry'),
                config('services.webservice.retry-milliseconds'),
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
