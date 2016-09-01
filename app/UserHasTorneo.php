<?php namespace Quinella;

use Illuminate\Database\Eloquent\Model;

class UserHasTorneo extends Model {

    protected $table = 'userhastorneo';
    
	protected $fillable = ['idTorneo', 'idUser', 'puntosTotal'];
    
}
