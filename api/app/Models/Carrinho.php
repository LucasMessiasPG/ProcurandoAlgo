<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
	public $primaryKey = 'id_carrinho';
	public $fillable = ['id_produto','quantidade','id_cliente','desconto'];
}
