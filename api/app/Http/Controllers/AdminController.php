<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mockery\CountValidator\Exception;

class AdminController extends Controller
{
    public function login(Request $request)
    {
			try{

		    $this->validate($request,[
			    'login'=>'required|min:4',
			    'password'=>'required|min:6'
		    ]);

				$usuario = new Usuario();
		    if($usuario->_login($request->all())){
			    return $this->_return('success','Login Efetuado');
		    }else{
			    return $this->_return('warning','Credenciais invalidas');
		    }

			}catch (Exception $e){
				dd($e->getMessage());
			}
    }

	public function auth(Request $request)
	{
		try{

			$this->validate($request,[
				'login'=>'required|min:4',
				'password'=>'required|min:6'
			]);

			$usuario = new Usuario();
			if($usuario->_auth($request->all())){
				return $this->_return('success','Login Efetuado');
			}else{
				return $this->_return('warning','Credenciais invalidas');
			}

		}catch (Exception $e){
			dd($e->getMessage());
		}
	}
}
