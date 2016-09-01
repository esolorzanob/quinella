<?php namespace Quinella;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model {

    protected $table = 'equipos';
    
	protected $fillable = ['id_api', 'nombre', 'area', 'liga', 'imagen'];
    
}
