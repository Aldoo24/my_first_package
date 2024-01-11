<?php

namespace Ap24\PackageForAgencies;

class ActivationController extends App\Http\Controllers\Controller
{
    public function activateKey()
    {
        $response = Http::withHeaders([
            'secret_key' => request('secretKey')
        ])->post(config('agencies.verify_key'), [
            'email' => request('email')
        ]);

        if ($response->found()) {
            return back()->with(['success' => 'Key was verified!']);
        } else {
            return back()->with(['error' => 'Email or key is not correct!']);
        }
    }
}
