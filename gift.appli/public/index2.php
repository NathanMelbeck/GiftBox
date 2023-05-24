<?php
declare(strict_types=1);

use gift\app\scripts\TD1\Exo2_quest1;
use gift\app\scripts\TD1\Exo2_quest2;
use gift\app\scripts\TD1\Exo2_quest3;
use gift\app\scripts\TD1\Exo2_quest4;
use gift\app\scripts\TD1\Exo2_quest5;

require_once __DIR__ . '/../src/vendor/autoload.php';

$quest1 = new Exo2_quest1();
echo $quest1->getQuest();

$quest2 = new Exo2_quest2();
echo $quest2->getQuest();

$quest3 = new Exo2_quest3();
echo $quest3->getQuest();

$quest4 = new Exo2_quest4();
echo $quest4->getQuest();

$quest5 = new Exo2_quest5();
echo $quest5->getQuest();