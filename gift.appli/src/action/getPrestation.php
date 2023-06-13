<?php

namespace gift\app\action;

use gift\app\services\prestations\PrestationNotFoundException;
use gift\app\services\prestations\PrestationService;
use Slim\Exception\HttpBadRequestException;
use Slim\Views\Twig;

class getPrestation {
    function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response): \Psr\Http\Message\ResponseInterface
    {
        $id = $request->getQueryParams()['id'] ?? null;
        if (is_null($id)) {
            throw new HttpBadRequestException($request, 'id non présente');
        } else {
            $prestationService = new PrestationService();
            try {
                $prestation = $prestationService->getPrestationById($id);
            } catch (PrestationNotFoundException $e){
                 $response->getBody()->write("<h1>{$e->getMessage()}");
                 return $response;
            }
            $categ = $prestationService->getCategorieById($prestation['cat_id']);
            $prestation['cat_id'] = $categ['libelle'];

            $data = [
                'prestation' => $prestation,
            ];
            $view = Twig::fromRequest($request);

            return $view->render($response, 'prestation.twig', $data);
        }
    }
}