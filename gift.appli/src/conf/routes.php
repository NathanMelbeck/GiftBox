<?php

namespace gift\app\conf;

use gift\app\action\getAcceuilAction;
use gift\app\action\getCategorieById;
use gift\app\action\getCategoriesAction;
use gift\app\action\getNewBoxe;
use gift\app\action\getNewBoxeForm;
use gift\app\action\getPrestation;
use gift\app\action\getPrestationsAction;
use gift\app\action\GetPrestationsByCategorieAction;


return function (\Slim\App $app): void {
    $app->get('/', getAcceuilAction::class)
        ->setName('acceuil');
    $app->get('/categories[/]', GetCategoriesAction::class)
        ->setName('categories');
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
};