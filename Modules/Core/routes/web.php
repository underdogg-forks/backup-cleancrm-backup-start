<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your Module. Just tell Your app the URIs it should respond to
| using a Closure or controller method. Build something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});


Route::get('/admincp', function () {
    return view('auth.login');
});


// Dashboard
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

// Administrator & SuperAdministrator Control Panel Routes
Route::group([
    'prefix' => 'admincp',
    'middleware' => 'auth',
    'middleware' => ['role:administrator|owner'],
    'namespace' => 'AdminCP'
], function () {
    Route::resource('users', 'UsersController');
    Route::resource('permissions', 'PermissionsController');
    Route::resource('roles', 'RolesController');
});