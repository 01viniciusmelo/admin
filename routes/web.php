<?php

Auth::routes(['register' => false]);

Route::view('/', 'welcome');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    
    Route::get('/users', 'UserController@index');
    Route::get('/users/{user}', 'UserController@show');
    
});
