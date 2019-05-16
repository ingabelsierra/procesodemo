<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $fillable = [
		'id_usuario', 'id_proceso', 'id_estado', 'descripcion'
	];
}
