<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
	public $primaryKey = 'id_comentario';
	public $fillable = ['comentario','nome','id_produto'];
}
