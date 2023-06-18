<?php

namespace gift\app\action;

use gift\app\services\prestations\BoxService;
use Slim\Routing\RouteContext;

class postcartePaiement
{
    function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args): \Psr\Http\Message\ResponseInterface
    {
        $boxService = new BoxService();
        if (isset($_SESSION['BoxCourante'])){
            $boxService->statut($_SESSION['BoxCourante'], 3);
            unset($_SESSION['BoxCourante']);
            unset($_SESSION['cartTotal']);
        }
        $routeParser = RouteContext::fromRequest($request)->getRouteParser();
        $url = $routeParser->urlFor('panier');

        return $response->withHeader('Location', $url)->withStatus(302);
    }

}