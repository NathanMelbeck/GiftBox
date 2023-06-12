<?php

namespace gift\app\action;

use gift\app\models\Categorie;
use gift\app\services\Auth\Auth;
use gift\app\services\Auth\injectionException;
use gift\app\services\Auth\mdrException;
use gift\app\services\prestations\PrestationService;
use gift\app\services\Utils\injection;
use JetBrains\PhpStorm\NoReturn;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class getRegisterAction {

    /**
     * @throws injectionException
     */
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface {
        $params = $request->getParsedBody();
        $routeParser = RouteContext::fromRequest($request)->getRouteParser();
        $url = $routeParser->urlFor('categories');

        $inject = new injection();
        $parametre = ['password', 'login', 'nom', 'prenom', 'telephone'];
        foreach ($parametre as $parameter) {
            if (!$inject->injectionString($parameter)) {
                throw new injectionException('Injection detecté ' . $parameter . "hihi");
            }
        }
        if (!$inject->injectionMail($params['email'])) throw new injectionException('Injection detecté ' . $params['email'] . " hihi");
        var_dump($params);
        $auth = new Auth();
        try {
            $auth->register($params['email'], $params['password'], $params['confirm_password']);
        } catch (mdrException $e) {
            echo 'password raté cheh salope';
            $url = $routeParser->urlFor('connection');
        }
        return $response->withHeader('Location', $url)->withStatus(302);

    }
}