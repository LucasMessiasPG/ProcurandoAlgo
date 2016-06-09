<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function listar(Request $request) {
        try {
            $clientes = Cliente::select([
                'clientes.*',
                DB::raw('count(pedidos.*) as qt_pedidos')
            ])
                ->leftJoin('pedidos', 'pedidos.id_cliente', '=', 'clientes.id_cliente')
                ->groupBy('clientes.id_cliente')
                ->get();
            
            return $this->_return(true, 'pedidos listados.', ['clientes' => $clientes]);
        } catch (\Exception $e) {
            return $this->_return('error','Erro ao listar clientes.',['error'=>$e->getMessage()]);
        }
    }
}
