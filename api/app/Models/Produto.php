<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
	public $primaryKey = 'id_produto';
	public $fillable = ['nome','descricao','valor_unitario','id_marca','rate'];
}
