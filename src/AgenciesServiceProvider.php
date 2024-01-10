<?php

namespace Ap24\PackageForAgencies;

use App\Models\User;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class AgenciesServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/agencies.php', 'agencies'
        );
    }

    public function boot(Gate $gate): void
    {
        $gate->define('view-app', function (User $user) {
            $response = Http::post(config('agencies.verify_key'), [
                'email' => $user->email
            ]);
            return $response->found();
        });

        $this->loadViewsFrom(__DIR__ . '/views', 'verify-secret-key');

        $this->publishes([
            __DIR__ . '/config/agencies.php' => config_path('agencies.php'),
            __DIR__ . '/views' => resource_path('views/vendor/agency'),
            __DIR__ . '/middleware' => app_path('http/middleware')
        ]);
    }

}
