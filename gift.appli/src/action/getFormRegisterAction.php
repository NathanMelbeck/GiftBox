<?php

namespace gift\app\action;

use Slim\Exception\HttpBadRequestException;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;

class getFormRegisterAction
{
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface
    {
        $view = Twig::fromRequest($request);
        $routeParser = RouteContext::fromRequest($request)->getRouteParser();


        if ($request->getMethod() === 'POST') {
            $params = $request->getParsedBody();

            $email = $params['email'] ?? '';
            $password = $params['password'] ?? '';
            $confirmPassword = $params['confirm_password'] ?? '';
            $login = $params['login'] ?? '';
            $nom = $params['nom'] ?? '';
            $prenom = $params['prenom'] ?? '';
            $telephone = $params['telephone'] ?? '';

            $errors = [];
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Veuillez saisir une adresse email valide.';
            }
            if (empty($password) || empty($confirmPassword) || $password !== $confirmPassword) {
                $errors[] = 'Les mots de passe ne correspondent pas.';
            }
            if (empty($login)) {
                $errors[] = 'Veuillez saisir un login.';
            }
            if (empty($nom)) {
                $errors[] = 'Veuillez saisir un nom.';
            }
            if (empty($prenom)) {
                $errors[] = 'Veuillez saisir un prénom.';
            }
            if (!empty($telephone) && !ctype_digit($telephone)) {
                $errors[] = 'Veuillez saisir un numéro de téléphone valide.';
            }

            if (!empty($errors)) {
                return $view->render($response, 'RegisterForm.twig', ['errors' => $errors]);
            }
            $url = $routeParser->urlFor('register');
            return $response->withHeader('Location', $url)->withStatus(302);
        }

        return $view->render($response, 'RegisterForm.twig');
    }
}
