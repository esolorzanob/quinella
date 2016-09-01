<?php namespace Quinella;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model {

    protected $table = 'torneos';
    
	protected $fillable = ['id_api', 'nombre', 'area', 'anno', 'imagen', 'status'];
    
}
