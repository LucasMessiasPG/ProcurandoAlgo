<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
	public $primaryKey = 'id_pedido';
	public $fillable = ['id_produto','id_usuario',];
}
