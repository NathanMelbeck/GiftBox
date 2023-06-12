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

    public function getPrestations(): array{
        return Prestation::all()->toArray();
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
    public function getPrestationsbyCategorie(int $categ_id):array{
        try {
            return Prestation::where('cat_id', $categ_id)->get()->toArray();
        } catch (ModelNotFoundException $e){
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

    public function addCategorie(array $categ_data): void
    {
        try {
            if ($categ_data['name'] != filter_var($categ_data['name'], FILTER_SANITIZE_STRING)) {
                throw new PrestationServiceBadDataException('Nom invalide');
            }
            if ($categ_data['description'] != filter_var($categ_data['description'], FILTER_SANITIZE_STRING)) {
                throw new PrestationServiceBadDataException('Description invalide');
            }

            $categorie = new Categorie($categ_data);
            $categorie->save();
        } catch (ModelNotFoundException $exception) {
            throw new PrestationNotFoundException('Categorie non trouvée', 404);
        }
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