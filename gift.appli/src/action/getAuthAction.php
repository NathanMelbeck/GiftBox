<?php

namespace gift\app\action;

use gift\app\services\Auth\Auth;
use gift\app\services\Auth\AuthException;
use gift\app\services\Auth\injectionException;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class getAuthAction {
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     * @throws injectionException
     */
    function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args): \Psr\Http\Message\ResponseInterface {


        $params = $request->getParsedBody();

        if(isset($params['email'])) {
            if (!filter_var($params['email'], FILTER_SANITIZE_EMAIL)){
                throw new injectionException('Mauvais format d\'email');
            } else {
                $email = $params['email'];
            }
        }
        $routeParser = RouteContext::fromRequest($request)->getRouteParser();
        $url = $routeParser->urlFor('categories');
        if(isset($params['password'])) {
            if (!filter_var($params['password'])){
                throw new injectionException('Mauvais format de mot de passe');
            } else {
                $psswrd = $params['password'];
            }
        }
        $auth = new Auth();
        try {
            $auth->authenticate($psswrd, $email);
        } catch (AuthException $e){
            $url = $routeParser->urlFor('connection');
        }

        return $response->withHeader('Location', $url)->withStatus(302);
    }
}