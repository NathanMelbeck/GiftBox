<?php

namespace gift\app\action;

use Slim\Views\Twig;

class getPanierAction {
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface {

        $view = Twig::fromRequest($request);
        $data = null;
        if(isset($_SESSION['panier'])){
            $data = $_SESSION['panier'];
        }
        return $view->render($response,
            'panier.twig', ['cartItems' => $_SESSION['panier'], 'cartTotal' => $_SESSION['cartTotal']]
        );
    }

}