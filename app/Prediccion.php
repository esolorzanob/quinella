<?php namespace Quinella;

use Illuminate\Database\Eloquent\Model;

class Prediccion extends Model {

    protected $table = 'predicciones';
    
	protected $fillable = ['idUser', 'idPartido', 'idTorneo', 'goles_a', 'goles_b', 'puntos'];
    
}
