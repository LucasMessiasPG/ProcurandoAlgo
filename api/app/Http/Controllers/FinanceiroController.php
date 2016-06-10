<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Pedido;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FinanceiroController extends Controller
{
    public function transaction(Request $request)
    {
	    $ch = curl_init('http://homolog.pagexpert.com/homolog/pedido/cadastrar');
	    $post = [
		    'valor'=>$request->valor,
		    'parcelas'=>$request->parcelas,
		    'nome_cartao'=>$request->nome_cartao,
		    'num_cartao'=>$request->num_cartao,
		    'cvc'=>$request->cvc,
		    'mes_cartao'=>$request->mes_cartao,
		    'ano_cartao'=>$request->ano_cartao,
		    'fura_fila'=>'erp'
	    ];

	    $data = http_build_query($post);


	    $headr = array();
	    $headr[] = 'Content-length: '.strlen($data);
	    $headr[] = 'Content-type: application/x-www-form-urlencoded';
	    $headr[] = 'Authorization: Basic '.base64_encode('12096746000121:123456');

	    curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
	    $response = curl_exec($ch);
	    curl_close($ch);
	    $parser = json_decode($response);
	    if(isset($parser->status) && isset($parser->cod)) {
		    $pedido = [
			    'id_cliente'=>$request->id_cliente,
			    'data_vencimento' => Carbon::now()->toDateTimeString(),
			    'forma_pagamento' => 2,
			    'id_status' => $parser->cod
		    ];

		    $newPedido = Pedido::create($pedido);
		    $email = new EmailController();
		    if($parser->cod == 0) {
			    $emailResult = $email->_create(['id_cliente'=>$pedido['id_cliente'],'msg'=>'Obrigado por fazer sua compra conosco. Seu pedido foi autorizado']);
			    return ['status' => 'success', 'msg' => 'Transação aprovada','json'=>$parser,'pedido'=>$newPedido,'email'=>$emailResult ];
		    }else{
			    $emailResult  = $email->_create(['id_cliente'=>$pedido['id_cliente'],'msg'=>'Obrigado por fazer sua compra conosco. Porem seu pedido não foi autorizado']);
			    return ['status' => 'warning', 'msg' => 'Não autorizado ou dados invalidos','json'=>$parser,'email'=>$emailResult];
		    }
	    }else{
		    return ['status'=>'error','msg'=>'Erro com a responsa com PagExpert','json'=>$parser];
	    }
    }
}
