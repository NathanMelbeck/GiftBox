<?php

namespace gift\api\action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class GetPrestationsAction
{
    public function __invoke(Request $request, Response $response): Response
    {
        $prestations = \gift\api\models\Prestation::all();

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
