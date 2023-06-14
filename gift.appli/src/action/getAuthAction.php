<?php

namespace gift\app\action;

use gift\app\services\Auth\Auth;
use gift\app\services\Auth\AuthException;
use gift\app\services\Auth\injectionException;
use Slim\Routing\RouteContext;


class getAuthAction {
    /**
     * @throws injectionException
     */
    function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args): \Psr\Http\Message\ResponseInterface {
        $params = $request->getParsedBody();
        $email = $params['email'];
        $psswrd = $params['password'];

        $routeParser = RouteContext::fromRequest($request)->getRouteParser();
        $url = $routeParser->urlFor('categories');

        $auth = new Auth();
        try {
            $auth->authenticate($psswrd, $email);
        } catch (AuthException $e){
            $url = $routeParser->urlFor('connection');
        }

        return $response->withHeader('Location', $url)->withStatus(302);
    }
}