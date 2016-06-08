<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
	public $primaryKey = 'id_pedido';
	public $fillable = ['id_carrinho','data_vencimento','data_pagamento','id_usuario','forma_pagamento','status_pagamento'];
}
