<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
		public $primaryKey = 'id_departamento';
		public $fillable = ['id_departamento_pai','nome','descricao'];
}
