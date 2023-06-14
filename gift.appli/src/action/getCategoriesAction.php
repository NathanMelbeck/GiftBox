<?php

namespace gift\app\action;

use gift\app\models\Categorie;
use gift\app\services\prestations\PrestationService;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class getCategoriesAction {
    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface {
        $prestationService = new PrestationService();
        $categories= $prestationService->getCategories();
        if (isset($_SESSION['BoxCourante'])) var_dump($_SESSION['BoxCourante']);
        $view = Twig::fromRequest($request);

        return $view->render($response,
            'categories.twig',
            ['categories' => $categories]
        );
    }
}