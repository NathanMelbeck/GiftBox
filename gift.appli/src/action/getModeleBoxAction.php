<?php

namespace gift\app\Action;

use gift\app\services\prestations\BoxService;
use Slim\Views\Twig;

class getModeleBoxAction {
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface {
        $boxService = new BoxService();
        $box= $boxService->getPrestaBoxModele();

        $view = Twig::fromRequest($request);

        return $view->render($response,
            'modeleBox.twig',
            ['boxes' => $box]
        );
    }
}