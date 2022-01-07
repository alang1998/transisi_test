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
    Route::post('company/import', 'CompanyController@import')->name('company.import');
    Route::get('getCompany', 'CompanyController@getCompany')->name('company.select');

    Route::resource('employee', 'EmployeeController');
    Route::get('exportPDF', 'EmployeeController@exportPDF')->name('employee.exportPDF');
});
