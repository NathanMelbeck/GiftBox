<?php

namespace gift\app\action;

use gift\app\models\Box;
use Slim\Views\Twig;

class getNewBoxe
{
    function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface
    {
        $params = $request->getParsedBody();
        $name = $params['name'] ?? '';
        $description = $params['description'] ?? '';

        $box = new Box();
        $box->libelle = $name;
        $box->description = $description;

        $box->save();
        $data = [
            'name' => $name,
            'description' => $description
        ];
        $view = Twig::fromRequest($request);

        return $view->render($response, 'newBox.twig', $data);
    }
}