<?php

namespace gift\app\services\prestations;

use gift\app\models\Box;
use gift\app\models\Prestation;
use Ramsey\Uuid\Uuid;

class BoxService
{
    public function getBoxes() {
        return Box::where('modele', 1)
            ->where('statut', 1)
            ->get();
    }

    function getBoxPrestaById($id) {
        $box = Box::find($id);

        if (!$box) {
            return null;
        }

        $prestations = $box->possedePrestation()->get();

        $libellePresta = [];

        foreach ($prestations as $prestation) {
            $libellePresta[] = $prestation;
        }

        $prestaBox = [
            'idBox' => $box->id,
            'libelle' => $box->libelle,
            'description' => $box->description,
            'montant' => $box->montant,
            'presta' => $libellePresta
        ];

        return $prestaBox;
    }

    function estModele($id){
        return Box::where('id', $id)
            ->where('modele', 1)
            ->exists();
    }

    function getPrestaBoxModele() {
        $prestaBoxArray = [];

        foreach ($this->getBoxes() as $box) {
            $prestations = $box->possedePrestation()->get();


            $libellePresta = [];

            foreach ($prestations as $prestation) {
                $libellePresta[] = $prestation->libelle;
            }

            $prestaBoxArray[] = [
                'idBox' => $box->id,
                'libelle' => $box->libelle,
                'description' => $box->description,
                'montant' => $box->montant,
                'libellePresta' => $libellePresta
            ];
        }

        return $prestaBoxArray;
    }

    function insertBoxPresta($boxId, $prestations) {
        $box = Box::find($boxId);

        foreach ($prestations as $prestation) {
            $presta = Prestation::find($prestation['prestation']['id']);

            $box->possedePrestation()->syncWithoutDetaching([
                $presta->id => ['quantite' => $prestation['quantite']]
            ]);
        }
    }

    function detachPrestationFromBox($boxId, $prestationId) {
        $box = Box::find($boxId);

        $box->possedePrestation()->detach($prestationId);
    }




    function createBox($name, $description, $token) {
        $box = new Box();
        $box->id = Uuid::uuid4()->toString();
        $box->token = $token;
        $box->libelle = $name;
        $box->description = $description;
        $box->modele = 0;
        $box->save();

        return $box->id;
    }



}
