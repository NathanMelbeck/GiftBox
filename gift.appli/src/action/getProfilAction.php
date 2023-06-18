<?php

namespace gift\app\action;

use gift\app\services\prestations\BoxService;
use gift\app\services\prestations\PrestationService;
use Slim\Views\Twig;

class getProfilAction
{
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface {
        $boxService = new BoxService();
        $box= $boxService->getBoxesUser($_SESSION['utilisateur']->email);
        $view = Twig::fromRequest($request);
        $user = $_SESSION['utilisateur']->toArray();
        return $view->render($response,
            'profil.twig',
            ['boxes' => $box, 'user' => $user]
        );
    }

}