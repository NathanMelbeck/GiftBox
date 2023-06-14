<?php

namespace gift\api\conf;


use gift\api\action\GetBoxByIdAction;
use gift\api\action\getCategoriesAction;
use gift\api\action\getPrestationsAction;
use gift\api\action\getPrestationsByCategorieAction;


return function (\Slim\App $app) {
    $app->get('/api/categories', getCategoriesAction::class);

    $app->get('/api/boxes/{ID}', GetBoxByIdAction::class);
    $app->get('/api/coffrets/{ID}', GetBoxByIdAction::class);

    $app->get('/api/prestations', getPrestationsAction::class );

    $app->get('/api/categories/{id}/prestations', getPrestationsByCategorieAction::class);
};
