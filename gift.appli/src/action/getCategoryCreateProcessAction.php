<?php

namespace gift\app\action;

use gift\app\services\prestations\PrestationService;
use gift\app\services\Utils\CsrfService;
use Slim\Exception\HttpBadRequestException;

class getCategoryCreateProcessAction
{
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $rq, \Psr\Http\Message\ResponseInterface $rs, array $args): \Psr\Http\Message\ResponseInterface
    {
        $post_data = $rq->getParsedBody();

        $token = $post_data['csrf_token'] ?? null;
        $token2 = isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : 'hihi';

        try {
            CsrfService::check($token);
        } catch (\Exception $e) {
            throw new HttpBadRequestException($rq, 'csrf token error ' . $token . ' session ' . $token2);
        }

        $categ_data = [
            'name' => $post_data['categ_lib'] ?? null,
            'description' => $post_data['categ_desc'] ?? null,
        ];

        if ($categ_data['name'] === null) {
            throw new HttpBadRequestException($rq, 'name is required');
        }

        if ($categ_data['description'] === null) {
            throw new HttpBadRequestException($rq, 'description is required');
        }

        $prestationService = new PrestationService();
        $prestationService->addCategorie($categ_data);

        $routeParser = \Slim\Routing\RouteContext::fromRequest($rq)->getRouteParser();
        $url = $routeParser->urlFor('categories');
        return $rs->withHeader('Location', $url)->withStatus(302);
    }
}
