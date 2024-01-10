<?php

namespace Ap24\PackageForAgencies\middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VerifySecretKeyController extends Controller
{
    public function __invoke(Request $request)
    {
        $response = Http::withHeaders([
            'secret_key' => $request->secretKey
        ])->post(config('agencies.verify_key'), [
            'email' => auth()->user()->email
        ]);

       if ($response->found()) {
           return redirect(route('flights.index'));
       } else {
           return back()->with('error', "Secret key doesn't exist!");
       }
    }
}
