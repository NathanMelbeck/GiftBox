<?php

namespace gift\app\action;

use gift\app\services\prestations\BoxService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpBadRequestException;
use Slim\Views\Twig;

class getBoxesDetailAction {
    /**
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = $args['id'] ?? null;
        if (is_null($id)) {
            throw new HttpBadRequestException($request, 'id non présente');
        } else {
            $boxService = new BoxService();
            $box = $boxService->getBoxPrestaById($id);

            $view = Twig::fromRequest($request);

            return $view->render($response, 'box.twig', ['box' => $box]);
        }
    }
}