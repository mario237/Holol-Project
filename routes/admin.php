<?php


Route::resource('banks', 'BankController');
Route::resource('employees', 'EmployeeController');

Route::put('/settings', 'SettingsController@store');
