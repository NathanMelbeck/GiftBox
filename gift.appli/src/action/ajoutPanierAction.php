<?php

namespace gift\app\action;

use gift\app\services\prestations\BoxService;
use gift\app\services\prestations\PrestationService;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;

class ajoutPanierAction {
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args): \Psr\Http\Message\ResponseInterface {
        $prestationId = $args['id'];

        $data = $request->getParsedBody();
        $quantity = isset($data['quantity']) ? intval($data['quantity']) : 1;

        $prestationService = new PrestationService();
        $prestation = $prestationService->getPrestationById($prestationId);

        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }

        $existingPrestationKey = null;
        foreach ($_SESSION['panier'] as $key => $item) {

            if ($item['prestation']['id'] === $prestation['id']) {
                $existingPrestationKey = $key;
                break;
            }
        }

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

        if (isset($_SESSION['utilisateur'])) {
            if (isset($_SESSION['BoxCourante'])){
                $boxService = new BoxService();
                $boxService->insertBoxPresta($_SESSION['BoxCourante'], $_SESSION['panier']);
            }

        }
        $_SESSION['cartTotal'] = $cartTotal;
        $routeParser = RouteContext::fromRequest($request)->getRouteParser();
        $url = $routeParser->urlFor('panier');
        return $response->withHeader('Location', $url)->withStatus(302);
    }
}