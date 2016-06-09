<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function create(Request $request)
    {
	    $this->_create($request->all());
    }

	public function _create($param){
		$message = $param;
//		$message = ['id_usuario'=>1,'msg'=>'teste'];
		$message['pessoa'] = Usuario::find($message['id_usuario']);

		$ch = curl_init('http://erp.dfsystems.com.br/api/v1/email');
		$post = [
			'metodo' => 'sendEmail',
			'parametros' => [
				'to' => ['lucasmessias.pg@outlook.com'],
				'from' => 'desenvolvimento@dfsystems.com.br',
				'body' => ['html'=>view('email', compact('message'))],
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
	}
}
