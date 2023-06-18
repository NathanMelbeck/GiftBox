<?php

namespace gift\app\action;

use gift\app\services\prestations\BoxService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpBadRequestException;
use Slim\Views\Twig;

class getBoxKdoAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $token = base64_decode($args['token']) ?? null;
        echo $token;
        if (is_null($token)) {
            throw new HttpBadRequestException($request, 'id non présente');
        } else {
            $boxService = new BoxService();
            $box = $boxService->getBoxByToken($token);
            $boxService->statut($box['idBox'], 5);

            $view = Twig::fromRequest($request);

            return $view->render($response, 'box.twig', ['box' => $box]);
        }
    }
}