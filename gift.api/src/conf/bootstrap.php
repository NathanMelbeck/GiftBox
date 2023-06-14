<?php

namespace gift\api\conf;
use Illuminate\Database\Capsule\Manager as DB;
use Slim\Factory\AppFactory;


$app = AppFactory::create();
$app->addErrorMiddleware(true,false,false);
$app->setBasePath('');
$db = new DB();
$db->addConnection(parse_ini_file(__DIR__ . '/gift.db.conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();

return $app;
