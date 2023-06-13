<?php

namespace gift\app\action;

use gift\app\services\prestations\BoxService;
use gift\app\services\Utils\CsrfService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class GetBoxesAction
{
    /**
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $view = Twig::fromRequest($request);
        $csrfToken = CsrfService::generate();

        $templateData = [
            'csrf_token' => $csrfToken
        ];

        return $view->render($response, 'boxes.twig', $templateData);
    }
}
