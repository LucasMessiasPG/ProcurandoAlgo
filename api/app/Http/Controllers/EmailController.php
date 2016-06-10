<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

use App\Http\Requests;

class EmailController extends Controller
{
    public function create(Request $request)
    {
	    return $this->_create($request->all());
    }

	public function _create($param){
		$message = $param;

		$message['pessoa'] = Cliente::find($message['id_cliente']);

		$ch = curl_init('http://erp.dfsystems.com.br/api/v1/email');
		$post = [
			'metodo' => 'sendEmail',
			'parametros' => [
				'to' => [$message['pessoa']->email],
				'from' => 'desenvolvimento@dfsystems.com.br',
				'body' => ['html'=>(String)view('email', compact('message'))],
				'titulo'=>'ProcurandoAlgo'
			]
		];

		$data = http_build_query($post);


		$headr = array();
		$headr[] = 'Content-length: '.strlen($data);
		$headr[] = 'Content-type: application/x-www-form-urlencoded';
		$headr[] = 'Authorization: Basic '.base64_encode('messias:23110405');

		curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
		$response = curl_exec($ch);
		curl_close($ch);
		$parser = json_decode($response);

		return $response;
	}
}
