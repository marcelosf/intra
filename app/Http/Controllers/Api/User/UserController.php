<?php

namespace Intranet\Http\Controllers\Api\User;

use Schneider\OAuthUsp\app\Http\Model\OauthUsers;
use Intranet\Http\Controllers\Controller;

class UserController extends Controller
{

    protected $user;

    public function __construct(OauthUsers $oauthUsers)
    {

        $this->user = $oauthUsers;

    }

    public function index()
    {

        return $this->user->all();

    }

}
