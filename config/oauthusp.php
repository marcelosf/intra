<?php



return [

    /*
    |--------------------------------------------------------------------------
    |Consumer Key
    |--------------------------------------------------------------------------
    |
    | Consumer Key provided by STI-USP to make requests
    |
    */

    'consumer_key' => 'iag_oauth',



    /*
    |--------------------------------------------------------------------------
    |Consumer Secret
    |--------------------------------------------------------------------------
    |
    | Consumer Secret provided by STI-USP to make requests
    |
    */

    'consumer_secret' => 'ADfpdAO5h1kHmjt9PZJGhG7JQQK2CAg6XbGJqHIR',


    /*
    |--------------------------------------------------------------------------
    |Environment.
    |--------------------------------------------------------------------------
    |
    | Witch environment to use. Values can be:
    | - production
    | - development
    | Eg.
    | 'environment' => 'development';
    |
    */

    'environment' => 'development',


    /*
    |--------------------------------------------------------------------------
    | OAuth Client Parameters.
    |--------------------------------------------------------------------------
    |
    | OAuth Client Parameters. The following parameters must be informed.
    | - request_token_resource
    | - authorize_url
    | - access_token_resource
    | - resource
    |
    */

    'parameters' => [

        'request_token_resource' => 'https://dev.uspdigital.usp.br/wsusuario/oauth/request_token',

        'authorize_url' => 'https://dev.uspdigital.usp.br/wsusuario/oauth/authorize',

        'access_token_resource' => 'https://dev.uspdigital.usp.br/wsusuario/oauth/access_token',

        'resource' => 'https://dev.uspdigital.usp.br/wsusuario/oauth/usuariousp',

        'callback_route_name' => 'oauth_test',

    ],
    
    
    /*
    |--------------------------------------------------------------------------
    | OAuth Client Parameters.
    |--------------------------------------------------------------------------
    |
    | The Id from the URL registered on Webservice
    |
    */

    'callback_id' => '6',

];