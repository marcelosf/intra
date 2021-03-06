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

//    Route::middleware(['api_oauth_usp'])->group(function () {
//
//        Route::get('oauth/login', 'Api\OAuthLoginController@oauthLogin')->name('api_oauth_login');
//
//        Route::get('oauth/request-token', 'Api\OAuthLoginController@getRequestTokenResource')->name('api_oauth_request-token');
//
//        Route::get('oauth/logout', 'Api\OAuthLoginController@oauthLogout')->name('api_oauth_logout');
//
//        Route::get('oauth/refresh', 'Api\OAuthLoginController@refreshToken')->name('api_oauth_refresh');
//
//    });

    Route::get('oauth/get-request-token', 'Api\JWTOAuthLoginController@getRequestToken')->name('api_jwt_request_token');

    Route::post('oauth/get-resource', 'Api\JWTOAuthLoginController@getUspResource')->name('api_jwt_resource');

    Route::middleware('auth:api')->group(function (){

        Route::get('oauth/jwt-logout', 'Api\JWTOAuthLoginController@oauthLogout')->name('api_jwt_logout');

        Route::get('oauth/jwt-user', 'Api\JWTOAuthLoginController@getUser')->name('api_jwt_get-user');

    });

    Route::get('oauth/check-user-auth', 'Api\JWTOAuthLoginController@check');


    /**
     * Administration routes
     */
    Route::prefix('admin')->group(function (){

        Route::resource('local', 'Api\Local\LocalController', ['only' => ['index', 'store', 'update', 'destroy', 'show']]);

    });

    /**
     * Manutenção Routes
     */
    Route::prefix('manutencao')->group(function(){

        Route::get('/', 'Api\Manutencao\ManutencaoController@index')->name('manutencao.index');

        Route::get('/show/{id}', 'Api\Manutencao\ManutencaoController@show')->name('manutencao.show');

        Route::get('/solicitacao/{id}/oss', 'Api\Manutencao\ManutencaoController@getOss')->name('manutencao.getOss');

        Route::get('/os/{id}/epis', 'Api\Manutencao\OSController@getEpis')->name('manutencao.os.epi');

        Route::get('/os/{id}', 'Api\Manutencao\OSController@show')->name('manutencao.os.show');

        Route::get('/os/{id}/tecnicos', 'Api\Manutencao\OSController@getTecnicos')->name('manutencao.os.tecnicos');

        Route::get('/epi', 'Api\Manutencao\EpiController@index')->name('manutencao.epi');

        Route::get('/tecnica', 'Api\Manutencao\TecnicaController@index')->name('manutencao.tecnica');

        Route::put('/solicitacao/{id}', 'Api\Manutencao\ManutencaoController@update')->name('manutencao.update');

        Route::post('/os', 'Api\Manutencao\OSController@store')->name('mnutencao.os.store');

        Route::put('/os/update/{id}', 'Api\Manutencao\OSController@update')->name('manutencao.os.update');

    });

    /**
     * Users
     *
     */
    Route::prefix('usuario')->group(function() {

        Route::get('/', 'Api\User\UserController@index')->name('usuario.index');

    });
});




Route::middleware('auth:api')->get('/oauth/test-token', function (Request $request) {

    return $request->user();

});