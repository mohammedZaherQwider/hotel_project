<?php

use Illuminate\Support\Facades\Route;

Route::prefix('user')->name('user.')->middleware('auth:web')->group(function() {
    Route::get('/dashboard',function (){
        return 'User dashboard';
    })->name('dashboard');
});
