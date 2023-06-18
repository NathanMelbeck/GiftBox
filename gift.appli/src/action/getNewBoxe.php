<?php

namespace gift\app\action;

use gift\app\models\Box;
use gift\app\services\prestations\BoxService;
use gift\app\services\Utils\CsrfService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpBadRequestException;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;
use Ramsey\Uuid\Uuid;

class getNewBoxe
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        if (!$this->isUserAuthenticated()) {
            $routeParser = RouteContext::fromRequest($request)->getRouteParser();
            $loginUrl = $routeParser->urlFor('register');
            return $response->withHeader('Location', $loginUrl)->withStatus(302);
        }

        $params = $request->getParsedBody();
        $name = $params['name'] ?? '';
        $description = $params['description'] ?? '';

        $token = $params['csrf_token'] ?? null;

        try {
            CsrfService::check($token);
        } catch (\Exception $e) {
            throw new HttpBadRequestException($request, 'CSRF token error');
        }

        $boxService = new BoxService();

        unset($_SESSION['panier']);
        $_SESSION['cartTotal'] = 0;
        $_SESSION['BoxCourante'] = $boxService->createBox($name, $description, $_SESSION['utilisateur']->email ,$token);;

        $data = [
            'name' => $name,
            'description' => $description
        ];

        $view = Twig::fromRequest($request);
        return $view->render($response, 'newBox.twig', $data);
    }

    private function isUserAuthenticated(): bool
    {
        if (isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']->email) {
            return true;
        } else {
            return false;
        }
    }
}
