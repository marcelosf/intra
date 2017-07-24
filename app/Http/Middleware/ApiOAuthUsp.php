<?php

namespace Intranet\Http\Middleware;

use Schneider\OAuthUsp\app\Http\Middleware\OAuthUsp as OAuthUspMiddleware;
use Schneider\OAuthUsp\Libraries\OAuthSession;

class ApiOAuthUsp extends OAuthUspMiddleware
{

    public function __construct(OAuthSession $oauthSession)
    {
        parent::__construct($oauthSession);

        $this->guard = 'api';

        $this->redirect = 'api_oauth_login';

    }

}
