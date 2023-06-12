<?php

namespace gift\app\services\prestations;

use gift\app\models\Categorie;
use gift\app\models\Prestation;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PrestationService {

    public function getCategories(): array{
        return Categorie::all()->toArray();
    }

    public function getPrestations($asc): array{
        return Prestation::orderBy('tarif', $asc)->get()->toArray();

    }

    /**
     * @throws CategorieNotFoundException
     */
    public function getCategorieById(int $id): array {
        try {
            return Categorie::where('id', $id)->firstOrFail()->toArray();
        } catch (ModelNotFoundException $e){
            throw new CategorieNotFoundException('ID non existante');
        }
    }


    /**
     * @throws PrestationNotFoundException
     */
    public function getPrestationById(string $id): array{
        try {
            return Prestation::where('id', $id)->firstOrFail()->toArray();
        } catch (ModelNotFoundException $e){
            throw new PrestationNotFoundException('ID non existante');
        }
    }

    /**
     * @throws PrestationByCategorieNotFoundException
     */
    public function getPrestationsByCategorie(int $categ_id, string $trie): array
    {
        try {
            $query = Prestation::where('cat_id', $categ_id);

            if ($trie === 'asc') {
                $query->orderBy('libelle', 'asc');
            } elseif ($trie === 'desc') {
                $query->orderBy('libelle', 'desc');
            }

            return $query->get()->toArray();
        } catch (ModelNotFoundException $e) {
            throw new PrestationByCategorieNotFoundException('ID non existante');
        }
    }



    /**
     * @throws PrestationNotFoundException
     */
    public function updatePrestation($attributs) {
        try {
            $prestation = Prestation::findOrFail($attributs['id']);
        } catch (ModelNotFoundException $e){
            throw new PrestationNotFoundException('ID non existante');
        }

        if (isset($attributs['libelle']))
            $prestation->libelle = $attributs['libelle'];

        if (isset($attributs['description']))
            $prestation->description = $attributs['description'];

        if (isset($attributs['unite']))
            $prestation->unite = $attributs['unite'];

        if (isset($attributs['tarif']))
            $prestation->tarif = $attributs['tarif'];

        $prestation->save();
    }

    /**
     * @throws PrestationNotFoundException
     */
    public function updateCatOfPrestation(string $idPrestation, int $idCategorie) {
        try {
            $prestation = Prestation::where('id', $idPrestation)->firstOrFail();
            $prestation->attach($idCategorie);
        } catch (ModelNotFoundException $exception) {
            throw new PrestationNotFoundException('Prestation non trouvée', 404);
        }
    }

    public function addCategorie() : int {
        $categorie = new Categorie();
        $categorie->libelle = 'Nouvelle catégorie';
        $categorie->save();
        return $categorie->id;
    }

    /**
     * @throws PrestationNotFoundException
     */
    public function deleteCategorie(int $id) {
        try {
            $categorie = Categorie::where('id', $id)->firstOrFail();
            $categorie->delete();
        } catch (ModelNotFoundException $exception) {
            throw new PrestationNotFoundException('Categorie non trouvée', 404);
        }
    }
}
