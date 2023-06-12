<?php

namespace gift\app\action;

use gift\app\services\prestations\PrestationByCategorieNotFoundException;
use gift\app\services\prestations\PrestationService;
use Slim\Views\Twig;


class GetPrestationsByCategorieAction
{
    function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, array $args): \Psr\Http\Message\ResponseInterface {
        $id = (int)$args['id'] ?? null;
        $prestationService = new PrestationService();
        $value = isset($_GET['value']) ? $_GET['value'] : 'desc';

        try {
            $prestation = $prestationService->getPrestationsbyCategorie($id, $value);
        } catch (PrestationByCategorieNotFoundException $e){
            $response->getBody()->write("<h1>{$e->getMessage()}");
            return $response;
        }

        $view = Twig::fromRequest($request);

        return $view->render($response, 'prestations.twig', ['prestations' => $prestation, 'urlName' => 'categ2prestas', 'categoryId' => $id, 'value' => $value,]);
    }

}