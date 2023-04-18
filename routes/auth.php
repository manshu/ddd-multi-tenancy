<?php

use Illuminate\Support\Facades\Route;


use Gurulabs\Http\Authentication\Controllers\RegisteredTenantController;

Route::get('/register', [RegisteredTenantController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredTenantController::class, 'store'])
    ->middleware('guest');
