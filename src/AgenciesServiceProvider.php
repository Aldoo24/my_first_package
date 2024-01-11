<?php

namespace Ap24\PackageForAgencies;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Router;

class AgenciesServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(Router $router): void
    {
        $router->aliasMiddleware('activateAccount', Ap24\PackageForAgencies\middleware\EnsureAgencyHasSecretKey::class);

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'verify-secret-key');

        $this->publishes([
            __DIR__ . '/config/agencies.php' => config_path('agencies.php'),
            __DIR__ . '/views' => resource_path('views/vendor/agencies'),
        ]);
    }

}
