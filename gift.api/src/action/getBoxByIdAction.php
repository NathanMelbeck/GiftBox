<?php

namespace gift\api\action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class GetBoxByIdAction
{
    public function __invoke(Request $request, Response $response, $args): Response
    {
        $boxId = $args['ID'];

        $box = \gift\api\models\Box::find($boxId);

        if (!$box) {
            $response->getBody()->write(json_encode(['error' => 'Coffret introuvable']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }

        $prestations = $box->possedePrestation;

        $data = [
            'type' => 'resource',
            'box' => [
                'id' => $box->id,
                'libelle' => $box->libelle,
                'description' => $box->description,
                'message_kdo' => $box->message_kdo,
                'statut' => $box->statut,
                'prestations' => [],
            ],
        ];

        foreach ($prestations as $prestation) {
            $data['box']['prestations'][] = [
                'libelle' => $prestation->libelle,
                'description' => $prestation->description,
                'contenu' => [
                    'box_id' => $box->id,
                    'presta_id' => $prestation->id,
                    'quantite' => $prestation->pivot->quantite,
                ],
            ];
        }



        $response->getBody()->write(json_encode($data));
        return
            $response->withHeader('Content-Type','application/json')
                ->withStatus(200);
    }
}
