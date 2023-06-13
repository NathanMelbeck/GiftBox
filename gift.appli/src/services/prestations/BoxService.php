<?php

namespace gift\app\services\prestations;

use gift\app\models\Box;

class BoxService
{
    public function getBoxes(): array{
        return Box::all()->toArray();
    }

}
