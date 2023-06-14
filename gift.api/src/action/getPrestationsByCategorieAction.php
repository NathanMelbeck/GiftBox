<?php

namespace gift\api\action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class getPrestationsByCategorieAction
{
    public function __invoke(Request $request, Response $response, $args): Response
    {
        $categoryId = $args['id'];

        $category = \gift\api\models\Categorie::find($categoryId);

        if (!$category) {
            $response->getBody()->write(json_encode(['error' => 'Catégorie introuvable']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }

        $prestations = $category->prestation;

        $data = [
            'type' => 'collection',
            'count' => count($prestations),
            'prestations' => [],
        ];

        foreach ($prestations as $prestation) {
            $data['prestations'][] = [
                'id' => $prestation->id,
                'libelle' => $prestation->libelle,
                'description' => $prestation->description,
            ];
        }

        $response->getBody()->write(json_encode($data));
        return
            $response->withHeader('Content-Type','application/json')
                ->withStatus(200);
    }
}
