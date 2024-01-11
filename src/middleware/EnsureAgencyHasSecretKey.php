<?php

namespace Ap24\PackageForAgencies\middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use GuzzleHttp\Client\Client;

class EnsureAgencyHasSecretKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = Http::post(config('agencies.check_key_activation'), [
            'email' => auth()->user()->email ?? $request->email
        ]);

        if ($response->found()) {
            return $next($request);
        } else {
            return redirect(route('verify-key'));
        }
    }
}
