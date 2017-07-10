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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'oauth_usp'], function () {

    Route::get('oauth/login', 'Api\OAuthLoginController@oauthLogin')->name('oauth_login');

});





Route::get('/oauth-logedin', function () {

    echo 'Logged in';

});