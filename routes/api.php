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


Route::get('/', 'Api\HomeController@index');


Route::middleware(['cors'])->group(function (){

    Route::middleware(['api_oauth_usp'])->group(function () {

        Route::get('oauth/login', 'Api\OAuthLoginController@oauthLogin')->name('api_oauth_login');

        Route::get('oauth/request-token', 'Api\OAuthLoginController@getRequestTokenResource')->name('api_oauth_request-token');

        Route::get('oauth/logout', 'Api\OAuthLoginController@oauthLogout')->name('api_oauth_logout');

        Route::get('oauth/refresh', 'Api\OAuthLoginController@refreshToken')->name('api_oauth_refresh');

    });

    Route::get('oauth/get-request-token', 'Api\JWTOAuthLoginController@getRequestToken')->name('api_jwt_request_token');

    Route::post('oauth/get-resource', 'Api\JWTOAuthLoginController@getUspResource')->name('api_jwt_resource');


    /**
     * Administration routes
     */
    Route::prefix('admin')->group(function (){

        Route::resource('local', 'Api\LocalController', ['only' => ['index', 'store', 'update', 'destroy', 'show']]);

    });

});




Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();

});