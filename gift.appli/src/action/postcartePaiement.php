<?php

namespace gift\app\action;

use gift\app\services\prestations\BoxService;
use Slim\Views\Twig;

class postcartePaiement
{
    function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args): \Psr\Http\Message\ResponseInterface
    {
        $boxService = new BoxService();
        if (isset($_SESSION['BoxCourante'])) $boxService->statut($_SESSION['BoxCourante'], 3);
        $view = Twig::fromRequest($request);

        return $view->render($response, 'paiementPanier.twig');
    }

}