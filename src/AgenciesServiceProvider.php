<?php

namespace Ap24\PackageForAgencies;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use Ap24\PackageForAgencies\middleware\EnsureAgencyHasSecretKey;

class AgenciesServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->app['router']->aliasMiddleware('activateAccount', EnsureAgencyHasSecretKey::class);

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
