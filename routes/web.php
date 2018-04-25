<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard/media', 'MediaController@index');

Auth::routes();
Route::patch('account/upgrade', 'Auth\AccountController@upgrade');

// Ideal routes
Route::get('/', 'EventsController@index');

// EVENTS
Route::prefix('/events')->group(function () {
    Route::post('/create', 'EventsController@store')->middleware('auth', 'organiser');
    Route::get('/{id}', 'EventsController@show')->middleware('ajax');
    Route::delete('/{id}', 'EventsController@destroy')->middleware('auth', 'organiser');
    Route::patch('/{event}', 'EventsController@update')->middleware('auth', 'organiser');
});

// DASHBOARD
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/events/create', 'DashboardController@newEvent')->middleware('organiser');
    // Route::get('/dashboard/media', 'DashboardController@media');
    Route::get('/events/{id}/edit', 'EventsController@edit')->middleware('organiser');   
});

// MEDIA
Route::post('/media/create', 'MediaController@store')->middleware('auth', 'organiser');

// LIKE
Route::post('/like', 'EventsController@like')->name('like')->middleware('auth');
