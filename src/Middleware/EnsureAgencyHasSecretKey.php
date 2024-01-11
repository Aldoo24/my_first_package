<?php

namespace Ap24\PackageForAgencies\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class EnsureAgencyHasSecretKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = Http::post(config('agency.check_key_activation'), [
            'email' => auth()->user()->email ?? $request->email
        ]);

        if ($response->found()) {
            return $next($request);
        } else {
            return redirect(route('verify-key'));
        }
    }
}
