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
        $token = $params['csrf_token'] ?? null;
        $token2 = $_SESSION['csrf_token'] ?? '';

        if ($token !== null && is_string($token)) {
            try {
                CsrfService::check($token);
            } catch (\Exception $e) {
                throw new HttpBadRequestException($request, 'CSRF token error');
            }
        }

        $box = new Box();
        $box->id = Uuid::uuid4()->toString();
        $box->token = $token;
        $box->libelle = $name;
        $box->description = $description;
        $box->save();

        $data = [
            'name' => $name,
            'description' => $description
        ];

        $view = Twig::fromRequest($request);
        return $view->render($response, 'newBox.twig', $data);
    }
}
