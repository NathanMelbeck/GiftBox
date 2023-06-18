<?php

namespace gift\app\action;

use gift\app\services\prestations\BoxService;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;

class genererUrlAction
{
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, $args): \Psr\Http\Message\ResponseInterface {
        $boxService = new BoxService();
        $boxes= $boxService->getBoxesUser($_SESSION['utilisateur']->email);

        $user = $_SESSION['utilisateur']->toArray();

        $id = $args['id'] ?? null;
        $box = $boxService->getBoxById($id);

        $boxService->statut($box->id, 4);



        $view = Twig::fromRequest($request);
        $urlCoffret =   '/coffret/' . base64_encode($box->token);
        echo $urlCoffret;
        return $view->render($response,
            'profil.twig',
            ['boxes' => $boxes, 'user' => $user, 'url' => $urlCoffret]
        );
    }
}