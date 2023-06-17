<?php

namespace gift\app\action;

use gift\app\services\prestations\BoxService;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;

class paiementPanierAction
{
    function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args): \Psr\Http\Message\ResponseInterface
    {
        // Récupération des données du formulaire
        $gift = isset($_POST['gift']) ? 1 : 0;
        $message = $gift ? $_POST['message'] : '';

        $boxSerivce = new BoxService();
        $boxSerivce->sauvegarderDonneesBox($_SESSION['BoxCourante'], $gift, $message);
        $view = Twig::fromRequest($request);

        return $view->render($response, 'paiementPanier.twig');
    }

}