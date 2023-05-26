<?php

namespace gift\app\action;

use gift\app\models\Categorie;
use gift\app\services\prestations\PrestationService;
use JetBrains\PhpStorm\NoReturn;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class getAcceuilAction {

    #[NoReturn] public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface {
        header("Location: /categories");
        exit;
    }
}