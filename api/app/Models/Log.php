<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
	public $primaryKey = 'log';
	public $fillable = ['descricao','id_usuario'];
}
