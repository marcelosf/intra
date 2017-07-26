<?php

namespace Intranet\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Intranet\Model\JWTOAuthUser;
use Schneider\OAuthUsp\app\Http\Controllers\JWTOAuthUspController;
use Illuminate\Http\Request;

class JWTOAuthLoginController extends JWTOAuthUspController
{


    protected $redirectTo = '/';


    public function __construct()
    {

        config(['auth.guards.api.driver' => 'jwt']);

        config(['auth.providers.users.model' => JWTOAuthUser::class]);

        config(['auth.providers.users.driver' => 'oauth_usp_user']);

    }

    /**
     * Authenticates user with JWT.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    protected function jwtAuthenticates(Request $request)
    {

        $credentials = $this->getCredentials($request);

        if (!$this->validateCredentials($credentials)) {

            $this->create($request->all());

        }

        if ($this->hasTooManyLoginAttempts($request)){

            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);

        }

        if ($token = Auth::guard('api')->attempt($credentials)) {

            return $this->sendOAuthLoginResponse($request, $token);

        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);

    }


    /**
     * Send the response after User has been authenticated.
     *
     * @param Request $request
     * @param $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendOAuthLoginResponse(Request $request, $token)
    {

        $this->clearLoginAttempts($request);

        $token = response()->json([

            'token' => $token

        ]);

        dd($token);

    }


    /**
     * Validate the user credentials.
     *
     * @param $credentials
     * @return mixed
     */
    protected function validateCredentials($credentials)
    {

        return Auth::guard('api')->validate($credentials);

    }


    /**
     * Increments failed login attempts.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendLockoutResponse(Request $request)
    {

        $seconds = $this->limiter()->availableIn($this->throttleKey($request));

        $message = Lang::get('auth.throttle', ['seconds' => $seconds]);

        return response()->json([

            'message' => $message,

        ], 403);

    }


    /**
     * Send an error response after too many failed login attempts.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {

        return response()->json([

            'message' => Lang::get('auth.failed')

        ], 401);

    }


    /**
     * Refresh Token.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshToken(Request $request)
    {

        $token = Auth::guard('api')->refresh();

        return $this->sendOAuthLoginResponse($request, $token);

    }

    /**
     * Log the user out.
     * @return \Illuminate\Http\JsonResponse
     */
    public function oauthLogout()
    {

        Auth::guard('api')->logout();

        return response()->json([], 204);

    }

}