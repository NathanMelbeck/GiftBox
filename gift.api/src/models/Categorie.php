<?php
declare(strict_types=1);
namespace gift\api\models;
use \Illuminate\Database\Eloquent as Eloq;

class Categorie extends Eloq\Model{
    protected $table = 'categorie';
    protected $primaryKey = 'id';
    protected $fillable = ['libelle', 'description'];
    public $timestamps = false;

    function prestation(){
        return $this->hasMany(Prestation::class, 'cat_id');
    }
}
