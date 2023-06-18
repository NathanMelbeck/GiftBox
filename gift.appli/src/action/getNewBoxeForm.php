<?php

namespace gift\app\action;

use gift\app\services\Utils\CsrfService;
use Slim\Views\Twig;

class getNewBoxeForm
{
    function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface
    {
        $view = Twig::fromRequest($request);
        $csrfToken = CsrfService::generate();

        $templateData = [
            'csrf_token' => $csrfToken
        ];

        return $view->render($response, 'newBoxForm.twig', $templateData);
    }
}