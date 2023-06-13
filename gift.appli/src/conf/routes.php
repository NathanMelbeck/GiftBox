<?php

namespace gift\app\conf;

use gift\app\action\getAcceuilAction;
use gift\app\action\getAuthAction;
use gift\app\action\GetBoxesAction;
use gift\app\action\getCategorieById;
use gift\app\action\getCategoriesAction;
use gift\app\action\getCategoryCreateProcessAction;
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
use gift\app\action\getRegisterAction;


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
    $app->get('/panier', getPanierAction::class)
        ->setName('panier');
    $app->get('/modeleBox', getModeleBoxAction::class)
        ->setName('modeleBox');

    //route pour les connections
    $app->get('/connection', getFormAuthAction::class)
        ->setName('connection');
    $app->post('/connection', getAuthAction::class)
        ->setName('connection');
    $app->get('/register', getFormRegisterAction::class)
        ->setName('register');
    $app->post('/register', getRegisterAction::class)
        ->setName('register');
};