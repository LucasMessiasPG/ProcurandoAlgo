<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
	public $primaryKey = 'id_pedido';
	public $fillable = ['id_carrinho','data_vencimento','data_pagamento','id_cliente','forma_pagamento','status_pagamento'];
	
	public function produtos() {
		return $this->hasMany('App\Models\PedidoProduto', 'id_pedido')
			->select([
				'produtos.*'
			])
			->join('produtos', 'produtos.id_produto', '=', 'pedido_produto.id_produto');
	}
}
