<?php

namespace gift\app\action;

use gift\app\services\prestations\BoxService;
use gift\app\services\prestations\PrestationService;
use Slim\Routing\RouteContext;

class supprPanierAction
{
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args): \Psr\Http\Message\ResponseInterface {
        $prestationId = $args['id'];

        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }

        $existingPrestationKey = null;
        foreach ($_SESSION['panier'] as $key => $item) {
            if ($item['prestation']['id'] === $prestationId) {
                $existingPrestationKey = $key;
                break;
            }
        }

        if ($existingPrestationKey !== null) {
            unset($_SESSION['panier'][$existingPrestationKey]);
        }

        $cartTotal = 0;
        foreach ($_SESSION['panier'] as $item) {
            $cartTotal += $item['prestation']['tarif'] * $item['quantite'];
        }

        if (isset($_SESSION['utilisateur'])) {
            if (isset($_SESSION['BoxCourante'])){
                $boxService = new BoxService();
                $boxService->detachPrestationFromBox($_SESSION['BoxCourante'], $prestationId);
            }
        }
        $_SESSION['cartTotal'] = $cartTotal;
        $routeParser = RouteContext::fromRequest($request)->getRouteParser();
        $url = $routeParser->urlFor('panier');
        return $response->withHeader('Location', $url)->withStatus(302);
    }

}