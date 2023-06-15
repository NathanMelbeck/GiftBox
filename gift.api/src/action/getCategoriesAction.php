<?php

namespace gift\api\action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class GetCategoriesAction
{
    public function __invoke(Request $request, Response $response): Response
    {
        $categories = \gift\api\models\Categorie::all();

        $data = [
            'type' => 'collection',
            'count' => count($categories),
            'categories' => [],
        ];

        foreach ($categories as $categorie) {
            $data['categories'][] = [
                'categorie' => [
                    'id' => $categorie->id,
                    'libelle' => $categorie->libelle,
                    'description' => $categorie->description,
                ],
                'links' => [
                    'self' => [
                        'href' => '/categories/' . $categorie->id . '/',
                    ],
                ],
            ];
        }

        $response->getBody()->write(json_encode($data));
        return
            $response->withHeader('Content-Type','application/json')
                ->withStatus(200);
    }
}
