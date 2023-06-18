<?php

namespace gift\app\action;

use gift\app\services\prestations\BoxService;
use Slim\Views\Twig;

class getPanierAction {
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface {


        $data = null;
        $total = 0;
        if(isset($_SESSION['BoxCourante'])){
            $boxServ = new BoxService();
            $data = $boxServ->getBoxPrestaById($_SESSION['BoxCourante']);
        }
        if(isset($_SESSION['cartTotal'])) $total = $_SESSION['cartTotal'];
        $view = Twig::fromRequest($request);
        return $view->render($response,
            'panier.twig', ['cartItems' => $data, 'cartTotal' => $total]
        );
    }

}