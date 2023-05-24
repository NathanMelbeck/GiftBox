<?php
declare(strict_types=1);
namespace gift\app\models;
use \Illuminate\Database\Eloquent as Eloq;

class Prestation extends Eloq\Model{
    protected $table = 'prestation';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = false;

    function categorie(){
        return $this->belongsTo(Categorie::class, 'cat_id');
    }

    function possedeBox(){
        return $this->belongsToMany(Box::class, 'box2presta',
            'presta_id', 'box_id')
            ->withPivot('quantite');
    }
}