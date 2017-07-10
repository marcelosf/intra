<?php

namespace Intranet\Model;

use Schneider\OAuthUsp\app\Http\Model\OauthUsers;
use Tymon\JWTAuth\Contracts\JWTSubject;

class JWTOAuthUser extends OauthUsers implements JWTSubject
{

    public function getJWTIdentifier()
    {

        return $this->id;

    }

    public function getJWTCustomClaims()
    {

        return [

            'user' => [

                'id' => $this->id,
                'name' => $this->name,
                'main_email' => $this->main_email

            ]

        ];

    }

}
