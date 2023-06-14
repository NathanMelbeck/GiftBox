<?php
declare(strict_types=1);
namespace gift\api\models;
use \Illuminate\Database\Eloquent as Eloq;

class user extends Eloq\Model{

    protected $table = 'user';
    protected $primaryKey = 'email';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = false;

}
