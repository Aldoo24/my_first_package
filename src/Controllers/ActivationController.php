<?php

namespace Ap24\PackageForAgencies\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;

class ActivationController extends Controller
{
    public function activateKey(): RedirectResponse
    {
        $response = Http::withHeaders([
            'secret_key' => request('secretKey')
        ])->post(config('agency.verify_key'), [
            'email' => request('email')
        ]);

        if ($response->found()) {
            return redirect(route(config('agency.redirect')) ?? '/');
        } else {
            return back()->with(['error' => 'Email or key is not correct!']);
        }
    }
}
