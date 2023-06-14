<?php

namespace gift\app\services\prestations;

use gift\app\models\Box;

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

    public function addPresationBox(array $presta_data): void {

    }



}
