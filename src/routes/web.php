<?php

use Illuminate\Support\Facades\Route;
use Ap24\PackageForAgencies\Controllers\ActivationController;

Route::get('verify-key', function () {
    return view('a24::verify-secret-key');
})->name('verify-key');

Route::post('verify-secret-key', [ActivationController::class, 'activateKey'])->name('activate-key');
