<?php

namespace gift\app\action;

use Slim\Views\Twig;
use gift\app\services\Utils\CsrfService;

class getNewCategoriesForm
{
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface
    {
        $view = Twig::fromRequest($request);
        $csrfToken = CsrfService::generate();

        $templateData = [
            'csrf_token' => $csrfToken
        ];

        return $view->render($response, 'create_categories.twig', $templateData);
    }
}
