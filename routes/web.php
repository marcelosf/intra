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

Route::get('/', function () {
    return view('home.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/oauth-logedin', function () {

    echo 'Logged in';

});

Route::middleware('oauth_usp')->group(function () {

    Route::get('oauth/login', '\Schneider\OAuthUsp\app\Http\Controllers\OAuthUspController@oauthLogin');

    Route::get('oauth/logout', '\Schneider\OAuthUsp\app\Http\Controllers\OAuthUspController@logout');

    Route::get('dashboard', '\Schneider\OAuthUsp\app\Http\Controllers\OAuthUspController@dashboard');

});