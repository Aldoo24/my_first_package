<?php

use Illuminate\Support\Facades\Route;

Route::get('verify-key', function () {
    return view('vendor.agencies.verify-secret-key');
})->name('verify-key');

Route::post('verify-secret-key', [Ap24\PackageForAgencies\Controllers\ActivationController::class, 'activateKey'])->name('activate-key');
