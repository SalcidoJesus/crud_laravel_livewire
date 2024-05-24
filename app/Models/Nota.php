<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;


	protected $fillable = ['titulo', 'descripcion', 'fk_usuario', 'estatus'];

	public function user()
	{
		// esta tarea pertenece a un usuario
		return $this->belongsTo(User::class);
	}

}
