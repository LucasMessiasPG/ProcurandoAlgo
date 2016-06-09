<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function create(Request $request)
    {
	    $ch = curl_init('http://erp.dfsystems.com.br');
	    $post = [
		    ''
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
    }
}
