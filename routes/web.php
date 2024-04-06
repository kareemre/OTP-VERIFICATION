<?php

use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::get('register',[RegisterUserController::class,'create']);

Route::post('register',[RegisterUserController::class,'register'])->name('re');


