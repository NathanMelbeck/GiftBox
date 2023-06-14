<?php

namespace gift\app\action;

use gift\app\models\Box;
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

        $box = new Box();
        $box->id = Uuid::uuid4()->toString();
        $box->token = $token;
        $box->libelle = $name;
        $box->description = $description;
        $box->modele = 0;
        $box->save();

        $_SESSION['BoxCourante'] = $box->id;

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
