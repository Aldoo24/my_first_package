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
        //
    }

    public function boot(Gate $gate): void
    {
        $gate->define('view-app', function (User $user) {
            $response = Http::post(config('agencies.check_key_activation'), [
                'email' => $user->email
            ]);
            return $response->found();
        });

        $gate->define('enter-app', function (User $user) {
            $response = Http::withHeaders([
                'secret_key' => request('secretKey')
            ])->post(config('agencies.verify_key'), [
                'email' => $user->email
            ]);

            return $response->found();
        });

        $this->loadViewsFrom(__DIR__ . '/views', 'verify-secret-key');

        $this->publishes([
            __DIR__ . '/public' => public_path('vendor/agencies'),
            __DIR__ . '/config/agencies.php' => config_path('agencies.php'),
            __DIR__ . '/views' => resource_path('views/vendor/agencies'),
            __DIR__ . '/middleware' => app_path('http/middleware'),
        ]);
    }

}
