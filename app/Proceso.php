<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $fillable = [
		'numero', 'fechaInicio', 'fechaFin', 'departamento','municipio','aprobado','comentarios','id_usuario','descripcion'
	];
	
	public function usuario() {
        return $this->hasOne(User::Class);
    }
}
