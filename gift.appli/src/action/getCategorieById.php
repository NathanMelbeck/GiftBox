<?php

namespace gift\app\action;

use gift\app\services\prestations\CategorieNotFoundException;
use gift\app\services\prestations\PrestationService;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class getCategorieById {
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args): \Psr\Http\Message\ResponseInterface {
        $id = (int)$args['id'] ?? null;
        $prestationService = new PrestationService();

        try {
            $categorie = $prestationService->getCategorieById($id);
        } catch (CategorieNotFoundException $e){
            $response->getBody()->write("<h1>{$e->getMessage()}");
            return $response;
        }

        $view = Twig::fromRequest($request);

        return $view->render($response, 'categoriesId.twig', ['categorie' => $categorie]);
    }
}