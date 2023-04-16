<?php

use Illuminate\Support\Facades\Route;


use Gurulabs\Http\Authentication\Controllers\RegisteredUserController;

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');
