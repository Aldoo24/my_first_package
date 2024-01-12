<?php

namespace Ap24\PackageForAgencies;

use Illuminate\Support\ServiceProvider;
use Ap24\PackageForAgencies\Middleware\EnsureAgencyHasSecretKey;

class AgenciesServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $router = $this->app['router'];
        $router->aliasMiddleware('activateAccount', EnsureAgencyHasSecretKey::class);

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'a24');

        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/agency'),
        ], 'agency-views');

        $this->publishes([
            __DIR__ . '/config/agency.php' => config_path('agency.php'),
        ], 'agency-config');
    }

}
