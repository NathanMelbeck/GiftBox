<?php

namespace gift\app\action;

use gift\app\services\prestations\BoxService;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;

class validerPanierAction {
    function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args): \Psr\Http\Message\ResponseInterface {
        if (isset($_SESSION['panier'])) {
            if (isset($_SESSION['BoxCourante'])) {
                $id = $_SESSION['BoxCourante'];
                $boxService = new BoxService();

                $box = $boxService->getBoxById($id);

                // Vérifier si le coffret contient au moins 2 prestations de 2 catégories différentes
                $prestations = $box->possedePrestation()->get();
                $categories = [];
                foreach ($prestations as $prestation) {
                    $categoryId = $prestation->cat_id;
                    if (!in_array($categoryId, $categories)) {
                        $categories[] = $categoryId;
                    }
                }

                if (count($prestations) >= 2 && count($categories) >= 2) {
                    $boxService->statut($id, 2);

                } else {
                    $routeParser = RouteContext::fromRequest($request)->getRouteParser();
                    $url = $routeParser->urlFor('panier');

                    return $response->withHeader('Location', $url)->withStatus(302);
                }
            }
        }
        $data = null;
        $total = 0;
        if(isset($_SESSION['panier'])){
            $data = $_SESSION['panier'];
        }
        if(isset($_SESSION['cartTotal'])) $total = $_SESSION['cartTotal'];
        $view = Twig::fromRequest($request);
        return $view->render($response,
            'panierValider.twig', ['cartItems' => $data, 'cartTotal' => $total]
        );
    }


}