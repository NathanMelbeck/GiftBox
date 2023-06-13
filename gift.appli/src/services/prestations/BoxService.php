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

    function getPrestaBoxModele() {
        $prestaBoxArray = [];

        foreach ($this->getBoxes() as $box) {
            $prestations = $box->possedePrestation();

            $libellePresta = [];

            foreach ($prestations as $prestation) {
                var_dump($prestation);
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



}
