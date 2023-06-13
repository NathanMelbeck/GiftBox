<?php

namespace gift\app\action;

use gift\app\models\Box;
use gift\app\services\Utils\CsrfService;
use Slim\Exception\HttpBadRequestException;
use Slim\Views\Twig;
use Ramsey\Uuid\Uuid;

class getNewBoxe
{
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface
    {
        $params = $request->getParsedBody();
        $name = $params['name'] ?? '';
        $description = $params['description'] ?? '';
        var_dump($params);

        $token = $params['csrf_token'] ?? null;
        $token2 = isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : 'hihi';

        try {
            CsrfService::check($token);
        } catch (\Exception $e) {
            throw new HttpBadRequestException($request, 'csrf token error ' . $token . ' session ' . $token2);
        }

        $box = new Box();
        $box->id = Uuid::uuid4()->toString();
        $box->token = $token;
        $box->libelle = $name;
        $box->description = $description;
        $box->modele=0;
        $box->save();

        $data = [
            'name' => $name,
            'description' => $description
        ];

        $routeParser = \Slim\Routing\RouteContext::fromRequest($request)->getRouteParser();
        $url = $routeParser->urlFor('boxes');
        return $response->withHeader('Location', $url)->withStatus(302);
    }
}
