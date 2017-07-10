<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();

});


Route::get('/', 'Api\HomeController@index');


Route::prefix('admin')->group(function (){

    Route::resource('local', 'Api\LocalController', ['only' => ['index', 'store', 'update', 'destroy', 'show']]);

});


Route::group(['middleware' => 'oauth_usp'], function () {

    Route::get('oauth/login', 'Api\OAuthLoginController@oauthLogin')->name('oauth_login');

    Route::get('oauth/logout', 'Api\OAuthLoginController@oauthLogout')->name('oauth_logout');

    Route::get('oauth/refresh', 'Api\OAuthLoginController@refreshToken')->name('oauth_refresh');

});