<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::middleware('auth')->group(function() {
    Route::get('/', 'DashboardController')->name('dashboard');

    Route::resource('company', 'CompanyController');
});
