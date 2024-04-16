<?php

use App\Http\Controllers\OtpController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Middleware\VerifiedOtp;
use Illuminate\Support\Facades\Route;

//dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', VerifiedOtp::class])->name('dashboard');



Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterUserController::class, 'create'])
                ->name('register');
                

    Route::post('register-user', [RegisterUserController::class, 'store'])
                ->name('register.user');
});



Route::middleware('auth')->group(function () {
    Route::get('register-otp', [OtpController::class, 'create'])
                ->name('otp.notice');


    Route::post('otp/register', [OtpController::class, 'store'])
                ->name('register.otp');
});



