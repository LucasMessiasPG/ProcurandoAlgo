<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
	public $table = 'pedido_produto';
    public $primaryKey = 'id_pedido_produto';
	public $fillable = ['id_produto','id_pedido'];
	public $timestamps = false;
	
	
}
