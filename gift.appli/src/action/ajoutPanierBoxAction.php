<?php

namespace gift\app\action;

use gift\app\services\prestations\BoxService;
use Slim\Routing\RouteContext;

class ajoutPanierBoxAction {
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args): \Psr\Http\Message\ResponseInterface {
        $boxId = $args['id'];

        $boxService = new BoxService();
        $box = $boxService->getBoxPrestaById($boxId);

        $prestations = $box['presta'];

        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }

        foreach ($prestations as $prestation){
            $existingPrestationKey = null;
            foreach ($_SESSION['panier'] as $key => $item) {

                if ($item['prestation']['id'] === $prestation['id']) {
                    $existingPrestationKey = $key;
                    break;
                }
            }

            $quantity = isset($prestation->pivot->quantite) ? intval($prestation->pivot->quantite) : 1;
            if ($existingPrestationKey !== null) {
                $_SESSION['panier'][$existingPrestationKey]['quantite'] += $quantity;
            } else {
                $_SESSION['panier'][] = [
                    'prestation' => $prestation,
                    'quantite' => $quantity
                ];
            }

            $cartTotal = 0;
            foreach ($_SESSION['panier'] as $item) {
                $cartTotal += $item['prestation']['tarif'] * $item['quantite'];
            }
        }

        if (isset($_SESSION['utilisateur']) && isset($_SESSION['BoxCourante'])) {
            var_dump($_SESSION['utilisateur']->email);
        }
        $_SESSION['cartTotal'] = $cartTotal;
        $routeParser = RouteContext::fromRequest($request)->getRouteParser();
        $url = $routeParser->urlFor('panier');
        return $response->withHeader('Location', $url)->withStatus(302);
    }

}