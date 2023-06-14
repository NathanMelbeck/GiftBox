<?php
declare(strict_types=1);

namespace gift\api\models;
use \Illuminate\Database\Eloquent as Eloq;

class Box extends Eloq\Model{
    protected $table = 'box';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = false;
    public $keyType = 'string';

    function possedePrestation(){
        return $this->belongsToMany(Prestation::class, 'box2presta',
            'box_id', 'presta_id')
            ->withPivot('quantite');
    }

}
