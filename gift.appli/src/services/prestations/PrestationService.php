<?php

namespace gift\app\services\prestations;

use gift\app\models\Categorie;
use gift\app\models\Prestation;
use gift\app\models\user;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PrestationService {

    public function getCategories(): array{
        return Categorie::all()->toArray();
    }
    public function getUser($email): array{
        return User::all()->toArray();
    }
    public function updateUserProfile($email, $name, $prenom, $telephone) {
        // Récupérer l'utilisateur actuel depuis la session
        $user = User::find($email);

        // Mettre à jour les informations du profil
        $user->nomUser = $name;
        $user->prenomUser = $prenom;
        $user->tel = $telephone;

        // Enregistrer les modifications dans la base de données
        $user->save();
        return $user;
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

    public function addCategorie(array $categ_data): void {
        try {
            if ($categ_data['name'] != filter_var($categ_data['name'])) {
                throw new PrestationServiceBadDataException('Nom invalide');
            }
            if ($categ_data['description'] != filter_var($categ_data['description'])) {
                throw new PrestationServiceBadDataException('Description invalide');
            }

            $categorie = new Categorie();

            $categorie->libelle = $categ_data['name'];
            $categorie->description = $categ_data['description'];
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
