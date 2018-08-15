<?php

namespace Controllers;

class AuthController
{
    public function __construct($app)
    {
        $app->get('/getToken', [$this, 'getToken']);
    }

    public function getToken($request, $response, $args)
    {
        print_r($request->getAttribute('decoded_token_data'));
    }
}
