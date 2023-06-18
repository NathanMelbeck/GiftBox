<?php

namespace gift\app\conf;

use gift\app\action\ajoutPanierAction;
use gift\app\action\ajoutPanierBoxAction;
use gift\app\action\genererUrlAction;
use gift\app\action\getAcceuilAction;
use gift\app\action\getAuthAction;
use gift\app\action\GetBoxesAction;
use gift\app\action\getBoxesDetailAction;
use gift\app\action\getBoxKdoAction;
use gift\app\action\getCategorieById;
use gift\app\action\getCategoriesAction;
use gift\app\action\getCategoryCreateProcessAction;
use gift\app\action\getDeconnexionAction;
use gift\app\action\getFormAuthAction;
use gift\app\action\getFormRegisterAction;
use gift\app\Action\getModeleBoxAction;
use gift\app\action\getNewBoxe;
use gift\app\action\getNewBoxeForm;
use gift\app\action\getNewCategoriesForm;
use gift\app\action\getPanierAction;
use gift\app\action\getPrestation;
use gift\app\action\getPrestationsAction;
use gift\app\action\GetPrestationsByCategorieAction;
use gift\app\action\getProfilAction;
use gift\app\action\getRegisterAction;
use gift\app\action\paiementPanierAction;
use gift\app\action\postcartePaiement;
use gift\app\action\postProfilAction;
use gift\app\action\supprPanierAction;
use gift\app\action\validerPanierAction;


return function (\Slim\App $app): void {
    $app->get('/', getAcceuilAction::class)
        ->setName('acceuil');
    $app->get('/categories[/]', GetCategoriesAction::class)
        ->setName('categories');
    $app->get('/categories/create[/]', getNewCategoriesForm::class)
        ->setName('categForm');
    $app->post('/categories/create[/]', getCategoryCreateProcessAction::class)
        ->setName('categCreate');
    $app->get('/categorie/{id:\d+}[/]', getCategorieById::class)
        ->setName('categoriesId');
    $app->get('/prestation', getPrestation::class)
        ->setName('prestation');
    $app->get('/boxes/new', getNewBoxeForm::class)
        ->setName('newBoxesForm');
    $app->post('/boxes/new', getNewBoxe::class)
        ->setName('newBoxes');
    $app->get('/categorie/{id:\d+}/prestations', GetPrestationsByCategorieAction::class)
        ->setName('categ2prestas');
    $app->get('/prestations', getPrestationsAction::class)
        ->setName('prestations');
    $app->get('/boxes', getBoxesAction::class)
        ->setName('boxes');
    $app->get('/boxe/{id}/', getBoxesDetailAction::class)
        ->setName('box');
    $app->get('/panier', getPanierAction::class)
        ->setName('panier');
    $app->get('/modeleBox', getModeleBoxAction::class)
        ->setName('modeleBox');
    $app->post('/ajouter-panier/{id}', ajoutPanierAction::class)
        ->setName('ajouter-panier');
    $app->get('/supprPanier/{id}', supprPanierAction::class)
        ->setName('suprPrestaPanier');
    $app->post('/ajouter-panier-box/{id}', ajoutPanierBoxAction::class)
        ->setName('ajouter-panier-box');
    $app->get('/validerPanier', validerPanierAction::class)
        ->setName('validerPanier');
    $app->post('/paiement', paiementPanierAction::class)
        ->setName('paiement');
    $app->post('/ConfirmPaiement', paiementPanierAction::class)
        ->setName('confirmerPaiement');
    $app->post('/cartePaiement', postcartePaiement::class)
        ->setName('cartePaiement');
    $app->get('/genererUrl/{id}', genererUrlAction::class)
        ->setName('genererUrl');
    $app->get('/coffret/{token}', getBoxKdoAction::class)
        ->setName('coffretKdo');

    //route pour les connections
    $app->get('/connection', getFormAuthAction::class)
        ->setName('connection');
    $app->post('/connection', getAuthAction::class)
        ->setName('connection');
    $app->get('/register', getFormRegisterAction::class)
        ->setName('register');
    $app->post('/register', getRegisterAction::class)
        ->setName('register');
    $app->get('/profil', getProfilAction::class)
        ->setName('profil');
    $app->post('/profil', postProfilAction::class)
        ->setName("profilChange");
    $app->get('/users/deconnexion', getDeconnexionAction::class)
        ->setName('logout');
};