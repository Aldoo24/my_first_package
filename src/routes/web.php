<?php
Route::group(['middleware' => ['auth']], function () {
    Route::get('verify-key', function () {
        return view('vendor.agency.verify-secret-key');
    })->name('verify-key');

    Route::post('verify-secret-key', VerifySecretKeyController::class)->name('verify-secret-key');
});
