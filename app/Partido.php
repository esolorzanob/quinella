<?php namespace Quinella;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model {

    protected $table = 'partidos';
    
	protected $fillable = ['id_api', 'team_a', 'team_b', 'fecha', 'match_day', 'torneo', 'goles_a', 'goles_b', 'ganador', 'estado'];
    
}
