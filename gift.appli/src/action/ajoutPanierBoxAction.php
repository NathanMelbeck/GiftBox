<?php

namespace gift\app\action;

use gift\app\services\prestations\BoxService;
use gift\app\services\Utils\CsrfService;
use Slim\Routing\RouteContext;

class ajoutPanierBoxAction {
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args): \Psr\Http\Message\ResponseInterface {
        $boxId = $args['id'];
        $boxService = new BoxService();

        if (isset($_SESSION['BoxCourante']) && $_SESSION['BoxCourante'] != $boxId) {
            unset($_SESSION['panier']);
        }

        if ($boxService->estModele($boxId) && isset($_SESSION['utilisateur'])) {
            $token = CsrfService::generate();
            $_SESSION['BoxCourante'] = $boxService->createBox('Votre Box', '',$_SESSION['utilisateur']->email, $token);
        } else {
            $_SESSION['BoxCourante'] = $boxId;
        }


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
                    'box' => $box,
                    'prestation' => $prestation,
                    'quantite' => $quantity
                ];
            }

            $cartTotal = 0;
            foreach ($_SESSION['panier'] as $item) {
                $cartTotal += $item['prestation']['tarif'] * $item['quantite'];
            }
        }

        if (isset($_SESSION['utilisateur'])) {
            if (isset($_SESSION['BoxCourante'])){
                $boxService = new BoxService();
                $boxService->insertBoxPresta($_SESSION['BoxCourante'], $_SESSION['panier']);
            }

        }
        $_SESSION['cartTotal'] = $cartTotal;
        $boxService->updateTotalBox($boxId, $cartTotal);
        $routeParser = RouteContext::fromRequest($request)->getRouteParser();
        $url = $routeParser->urlFor('panier');

        return $response->withHeader('Location', $url)->withStatus(302);
    }

}