<?php

namespace gift\app\action;

use gift\app\services\prestations\BoxService;
use gift\app\services\prestations\PrestationService;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;

class postProfilAction
{
    public function __invoke($request, $response, $args) {
        $data = $request->getParsedBody();
        $name = isset($data['name']) ? $data['name'] : '';
        $prenom = isset($data['prenom']) ? $data['prenom'] : '';
        $telephone = isset($data['telephone']) ? $data['telephone'] : '';

        $PrestationService = new PrestationService();
        // Mettre à jour le profil de l'utilisateur
        $_SESSION['utilisateur'] = $PrestationService->updateUserProfile($_SESSION['utilisateur']->email, $name, $prenom, $telephone);


        // Rediriger vers la page de profil
        $routeParser = RouteContext::fromRequest($request)->getRouteParser();
        $url = $routeParser->urlFor('profil');
        return $response->withHeader('Location', $url)->withStatus(302);
    }


}