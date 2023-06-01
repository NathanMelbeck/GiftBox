<?php

namespace gift\app\action;

use gift\app\services\Auth\injectionException;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class getAuthAction {
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     * @throws injectionException
     */
    function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args): \Psr\Http\Message\ResponseInterface {


        $params = $request->getParsedBody();

        if(isset($params['email'])) {
            if (!filter_var($params['email'], FILTER_SANITIZE_EMAIL)){
                throw new injectionException('Mauvais format d\'email');
            } else {
                $email = $params['email'];
            }
        }

        if(isset($params['password'])) {
            if (!filter_var($params['password'])){
                throw new injectionException('Mauvais format de mot de passe');
            } else {
                $psswrd = $params['password'];
            }
        }
        session_start();
        $_SESSION['utilisateur'] = "eheh";
        echo $_SESSION['utilisateur'];
        $view = Twig::fromRequest($request);

        return $view->render($response, 'AuthForm.twig');
    }
}