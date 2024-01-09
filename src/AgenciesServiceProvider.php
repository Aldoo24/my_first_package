<?php

namespace Ap24\PackageForAgencies;

use App\Models\User;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AgenciesServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(Gate $gate): void
    {
        $gate->define('view-app', function (User $user) {
            return DB::table('secret_keys')->where('user_id', $user->id)->where('activated', 1)->exists();
        });

        $this->loadViewsFrom(__DIR__ . '/views', 'verify-secret-key');

        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/agency'),
            __DIR__ . '/middleware' => app_path('http/middleware')
        ]);
    }

}
